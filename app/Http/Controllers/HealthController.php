<?php

namespace App\Http\Controllers;

use App\Http\Requests\HealthRequest;
use App\Models\Animal;
use App\Models\Farm;
use App\Models\Health;
use App\Models\Medicament;
use App\Repositories\HealthRepository;
use Illuminate\Http\Request;

class HealthController extends Controller
{
    private $paginate = 10;

    public function index(Health $health)
    {
        $title = 'Treatment of all animals';

        $animals = Farm::find(auth()->user()->farm_id)->animals;
        $medicaments = Medicament::all();

        $farm = Farm::find(auth()->user()->farm_id);

        $healts = Health::where('farm_id', '=', auth()->user()->farm_id)->paginate($this->paginate);

        return view('health.index', ['healts' => $healts],
            compact('title', 'animals', 'medicaments', 'farm'));
    }

    /**/
    public function healthByAnimal($id)
    {
        $title = 'Treatment by specific animal';
        $healthByAnimal = Animal::find($id);
        if (isset($healthByAnimal) && ($healthByAnimal->farm_id == auth()->user()->farm_id)) {
            $healts = Health::where('animal_id', '=', $healthByAnimal->id)->paginate($this->paginate);
            return view('health.index', ['healts' => $healts],
                compact('title', 'healts', 'farm'));
        } else
            return URL::previous();
    }

    /**/

    public function create()
    {
        $title = 'New treatment record';
        $animals = Farm::find(auth()->user()->farm_id)->animals;
        $medicaments = Medicament::all();

        return view('health.create', compact('animals', 'title', 'medicaments'));
    }

    public function store(HealthRequest $request, HealthRepository $repository)
    {
        $data = $request->validated();

        $data = $repository->preventiveTreatment($data);
        $data['farm_id'] = auth()->user()->farm_id;
        $data['user_id'] = auth()->user()->id;

        Health::create($data);

        $request->session()->flash("'alert-success', 'Animal cadastrado!',
            'alert-danger', 'Oops! não foi possível cadastrar!'");

        return redirect()->route('health.index');
    }

    public function edit($id)
    {
        $health = Health::find($id);
        if (($health != null) && ($health->farm_id == auth()->user()->farm_id)) {
            $title = 'Edit treatment record';
            $animals = Farm::find(auth()->user()->farm_id)->animals;
            $medicaments = Medicament::all();

            return view('health.edit', compact('title', 'health', 'animals', 'medicaments'));
        } else
            return redirect()->back();
    }

    public function update(HealthRequest $request, $id)
    {
        $data = $request->validated();
        $health = Health::find($id);
        $data['farm_id'] = auth()->user()->farm_id;
        $data['user_id'] = auth()->user()->id;

        $health->update($data);

        $request->session()->flash("'alert-success', 'Editado com sucesso!',
            'alert-danger', 'Oops! não foi possível editar!'");

        return redirect()->route('health.index');
    }

    public function show($id)
    {
        $title = 'Detalhes do Tratamento';
        $health = Health::find($id);
        if (($health != null) && ($health->farm_id == auth()->user()->farm_id)) {
            $animal = Animal::find($health->animal_id);
            $medicaments = Medicament::all();

            return view('health.show',
                compact('title', 'health', 'animal', 'medicaments'));
        } else
            return redirect()->back();
    }
}
