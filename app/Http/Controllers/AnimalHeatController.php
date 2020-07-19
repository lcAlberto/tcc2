<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Services\AnimalRepository;
use App\Services\AnimalServices;
use App\Http\Requests\CioRequest;
use App\Models\AnimalHeat;
use App\Repositories\CioRepository;
use App\Models\Animal;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;


class AnimalHeatController extends Controller
{
    private $paginate = 10;

    public function index(AnimalHeat $animalHeat)
    {
        $title = 'Reproductive cycle management';
        /*retorna todos os animais da fazenda*/
        $animals = Farm::find(auth()->user()->farm_id)->animals;

        /*retorna a fazenda que o cio ta*/
        $farm = Farm::find(auth()->user()->farm_id);

        /*retorna todos os cios da fazenda*/
        $cios = Farm::find(auth()->user()->farm_id)->animalHeat;
        $cios = AnimalHeat::where('farm_id', '=', auth()->user()->farm_id)->paginate($this->paginate);

        return view('cios.index', ['cios' => $cios],
            compact('title', 'animals', 'cios'));
    }

    public function create($id)
    {
        $title = 'Register a new reproductive cycle';
        $animals = Animal::find($id);
        $flock = Animal::all();

        return view('cios.create', compact('animals', 'flock', 'title'));
    }

    public function store(CioRequest $request, AnimalHeat $animalHeat, AnimalServices $services, AnimalRepository $animalRepository)
    {
        $title = 'create-cio';
        $data = $request->validated();
        $data = $services->dateHandling($data);
        $data = $services->managementFather($request, $data);
        $data = $services->status($request, $data);
        $data = $services->birthPrediction($data);
        $data = $animalRepository->farm_by($data);

        $animalHeat->create($data);

        $mensagem = $request->mensagem;
        $request->session()->flash('alert-success', 'Novo cio registrado !',
            'alert-danger', 'Oops! não foi possível registrar!');

        return redirect()->route('cio.index')->with($title);
    }

    public function edit($id)
    {
        $cios = AnimalHeat::find($id);
        $title = 'Edit this reproductive cycle';
        $dateTime = new DateTime();
        if (isset($cios) && ($cios->farm_id == auth()->user()->farm_id)) {
            $animal = Animal::find($cios->animal_id);
            if ($animal == null)
                return redirect()->route('cio.index');
            return view('cios.edit', compact('cios', 'animal', 'dateTime', 'title'));
        } else
            return URL::previous();
    }

    public function update(CioRequest $request, AnimalServices $services,
                           AnimalRepository $animalRepository, $id)
    {
        $data = $request->validated();
        $current = AnimalHeat::find($id);
        $data['animal_id'] = (int)$data['animal_id'];
        $data = $services->dateHandling($data);
        $data = $services->birthPrediction($data);
        $data = $services->statusVerification($data, $current);
        // $data = $services->date_childbirth_foreseenVerification($data);
        $data = $services->managementFather($request, $data);
        $data = $services->create_by($data);
        $data = $animalRepository->farm_by($data);

        $current->update($data);

        $mensagem = $request->mensagem;
        $request->session()->flash('alert-primary', 'Cio Atualizado !',
            'alert-danger', 'Oops! não foi possível atuaizar!');

        return redirect()->route('cio.index');
    }

    public function show($id)
    {
        $title = ' ';
        $cio = AnimalHeat::find($id);
        if (isset($cio) && ($cio->farm_id == auth()->user()->farm_id)) {
            $animal = Animal::find($cio->animal_id);
            if ($animal == null)
                return redirect()->route('cio.index');
            return view('cios.show', compact('cio', 'animal', 'title', 'animal'));
        } else return URL::previous();
    }

    public function heatByAnimal($id)
    {
        $title = 'Reproductive cycle per animal';
        $description = 'Here you manage the entire reproductive cycle of each animal';
        $cio = Animal::find($id);
        if (isset($cio) && ($cio->farm_id == auth()->user()->farm_id)) {
            $animals = Animal::find($cio->animal_id);
            return view('cios.index',
                compact('title', 'description', 'animals', 'cio'));
        } else
            return URL::previous();
    }

    public function destroy(Request $request, $id)//$animal_id
    {
        $animalHeat = AnimalHeat::find($id);
        if (($animalHeat != null) && ($animalHeat->farm_id == auth()->user()->farm_id)) {
            AnimalHeat::destroy($id);
            $request->session()->flash('alert-warning', 'Cio Deletado !',
                'alert-danger', 'Oops! não foi possível deletar!');
            return redirect()->route('animals.index')
                ->with('success', 'User deleted successfully');
        } else
            return redirect()->route('cio.index');
    }

    public function search(Request $request, Animal $animal)
    {
        $title = 'Search';
        $dataForm = $request->all();
        $animals = $animal->search($dataForm);

        $cios = AnimalHeat::paginate($this->paginate);

        return view('cios.index', compact(['users'], 'title', 'cios', 'animals'));
    }
}
