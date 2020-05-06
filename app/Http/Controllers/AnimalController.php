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
        $title = 'Flock';
        $animals = Animal::where('farm_id', '=', auth()->user()->farm_id)->paginate($this->paginate);

        return view('animals.flock.index', compact('animals', 'title'));
    }

    public function create(Animal $animal)
    {
        $title = 'Create new Animal';
        $animals = $animal->all();

        return view('animals.flock.create', compact('animals', 'title'));
    }

    public function store(FlockRequest $request, AnimalRepository $auxAnimal, Animal $animal)
    {
        $data = $auxAnimal->createAnimalProfile($request);
        $data = $auxAnimal->validationOfBorn_date($data);
        $data = $auxAnimal->created_by($data);
        $data = $auxAnimal->farm_by($data);

        $animal->create($data);
        $request->session()->flash("'alert-success', 'Animal cadastrado!',
            'alert-danger', 'Oops! não foi possível cadastrar!'");

        return redirect()->route('animals.index');
    }

    public function edit($id)
    {
        $animals = Animal::find($id);
        if (isset($animals) && ($animals->farm_id == auth()->user()->farm_id)) {
            $title = 'Edit new Animal';
            $dateTime = new DateTime();
            return view('animals.flock.edit', compact('animals', 'title', 'dateTime'));
        } else
            return redirect()->route('animals.index');
    }

    public function update(Request $request, Animal $animal, AnimalRepository $auxAnimal, $id)
    {
        $current = Animal::find($id);
        $data = $auxAnimal->updateAnimalProfile($current, $request);
        $data = $auxAnimal->created_by($data);
        $data = $auxAnimal->farm_by($data);

        $animal->update($data);

        $request->session()->flash("'alert-success', 'Animal atualizado com sucesso!',
            'alert-danger', 'Oops! não foi possível cadastrar!'");

        return redirect()->route('animals.index');
    }

    public function show(Animal $animal, AnimalHeat $animalHeat, $id)
    {
        $animals = $animal->find($id);
        if (isset($animals) && ($animals->farm_id == auth()->user()->farm_id))
            return view('animals.flock.show', compact('animals'));
        else
            return redirect()->route('animals.index');
    }

    public function destroy(Request $request, $id)//$animal_id
    {
        $animal = Animal::find($id);
        if(($animal != null) && ($animal->farm_id == auth()->user()->farm_id)) {
            Animal::destroy($id);//Não deleta do banco, so da listagem
            $request->session()->flash("'alert-warning', 'Animal Deletado !',
            'alert-danger', 'Oops! não foi possível deletar!'");
            return redirect()->route('animals.index')
                ->with('success', 'User deleted successfully');
        }else
            return redirect()->route('animals.index');
    }

    public function animalsReports(PDF $pdf)
    {
        $farm = Farm::find(auth()->user()->id);

        return $pdf->loadView('reports.flock-registers',
            compact('animal', 'animals', 'farm', "Total-Animais"))
            ->setPaper('A4', 'landscape')->stream();

//        return $report->download('flock-all.pdf');
    }

    public function search(Request $request)
    {
        $title = 'search';
        $animals = DB::table('animals')
            ->where('code', 'ilike', '%' . $request->search . '%')
            ->orWhere('name', 'ilike', '%' . $request->search . '%')
            ->orWhere('breed', 'ilike', '%' . $request->search . '%')
            ->orWhere('sex', 'ilike', '%' . $request->search . '%')
            ->orWhere('mother', 'ilike', '%' . $request->search . '%')
            ->orWhere('father', 'ilike', '%' . $request->search . '%')
            ->get();

//        return view('animals.flock.index', compact(['users'], 'title', 'farm'));
        return view('animals.flock.index', compact('animals', 'title'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
}
