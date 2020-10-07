<?php

namespace App\Http\Controllers;

use App\Models\AnimalHeat;
use App\Models\Farm;
use DateTime;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Requests\FlockRequest;
use App\Models\Animal;
use App\Services\AnimalRepository;
use App\Services\AnimalStatus;
use Spatie\Permission\Models\Role;

//use const http\Client\Curl\AUTH_ANY;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\PDF;

class AnimalController extends Controller
{
    private $paginate = 5;

    public function index()
    {
        $animals = Farm::find(auth()->user()->farm_id)->animals;//retorna todos os animais da fazenda
        $title = 'flock Managment';
        $description = 'Manage your animals here. This is your whole herd';
        $animals = Animal::where('farm_id', '=', auth()->user()->farm_id)
            ->paginate($this->paginate);

        return view('flock.index', compact('animals', 'title', 'description'));
    }

    public function create(Animal $animal)
    {
        $title = 'Create new Animal';
        $description = 'Cadastre novos animais. Verifique todos os campos fornecendo os dados necessários';
        $animals = Farm::find(auth()->user()->farm_id)->animals;
        return view('flock.create', compact('animals', 'title', 'description'));
    }

    public function store(FlockRequest $request, AnimalRepository $auxAnimal, Animal $animal)
    {
        $data = $auxAnimal->createAnimalProfile($request);
        $data = $auxAnimal->validationOfBorn_date($data);
        $data = $auxAnimal->created_by($data);
        $data = $auxAnimal->farm_by($data);

        $data = $animal->create($data);

        return redirect()->route('animals.index');
    }

    public function edit($id)
    {
        $current = Animal::find($id);
        $animals = Animal::all();
        if (isset($current) && ($current->farm_id == auth()->user()->farm_id)) {
            $title = 'Edit this animal';
            $description = 'Check all fields providing the necessary data';
            $dateTime = new DateTime();
            return view('flock.edit', compact('current', 'animals', 'title', 'description', 'dateTime'));
        } else
            return redirect()->route('animals.index');
    }

    public function update(FlockRequest $request, Animal $animal, AnimalRepository $auxAnimal, $id)
    {
        $data = $request->validated();
        $animal = Animal::find($id);
        $data = $auxAnimal->createAnimalProfile($request);
        $data = $auxAnimal->validationOfBorn_date($data);
        $data = $auxAnimal->created_by($data);
        $data = $auxAnimal->farm_by($data);

        $animal->update($data);

        return redirect()->route('animals.index');
    }

    public function show(Animal $animal, AnimalHeat $animalHeat, $id)
    {
        $animals = $animal->find($id);
        $title = 'Details of this animal';
        if (isset($animals) && ($animals->farm_id == auth()->user()->farm_id))
            return view('flock.show', compact('animals', 'title'));
        else
            return redirect()->route('animals.index');
    }

    public function destroy(Request $request, $id)//$animal_id
    {
        $animal = Animal::find($id);
        if (($animal != null) && ($animal->farm_id == auth()->user()->farm_id)) {
            Animal::destroy($id);//Não deleta do banco, so da listagem
            $msg = $request->session()->flash("'alert-warning', 'Animal Deletado !',
            'alert-danger', 'Oops! não foi possível deletar!'");
            return redirect()->route('animals.index')
                ->with('success', 'User deleted successfully');
        } else
            return redirect()->route('animals.index');
    }

    public function animalsReports(PDF $pdf)
    {
        return redirect()->route('animals.index');
        /*
        $farm = Farm::find(auth()->user()->id);

        return $pdf->loadView('reports.flock-registers',
            compact('animal', 'animals', 'farm', "Total-Animais"))
            ->setPaper('A4', 'landscape')->stream();

//        return $report->download('flock-all.pdf');*/
    }

    public function search(Animal $model, Request $request)
    {
        $title = 'search';
        $data = $request->all();
        $animals = $model->search($data);

        return view('flock.index', compact('animals', 'title'))
            ->with('i', ($request->input('page', 1) - 1) * 5);

    }
}
