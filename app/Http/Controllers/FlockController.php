<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FlockRequest;
use App\Models\Animal;
use App\Services\AuxAnimal;
use Spatie\Permission\Models\Role;

class FlockController extends Controller
{
    private $paginate = 10;

    public function index()
    {
        $title = 'Flock';
        $animals = Animal::paginate($this->paginate);
        return view('animals.flock.index', ['animals' => $animals], compact('title'));
    }

    public function create(Animal $animal)
    {
        $title = 'Create new Animal';
        $animals = $animal->all();
        return view('animals.flock.create', compact('animals', 'title'));
    }

    public function store(Request $request, AuxAnimal $auxAnimal, Animal $animal)
    {
        $data = $auxAnimal->createAnimalProfile($request);
        $data = $auxAnimal->idadeAnimal($request, $data);
        $data = $auxAnimal->created_by($data);

        $animals = $animal->create($data);

        $mensagem = $request->mensagem;
        $request->session()->flash('alert-success', 'Animal cadastrado!',
            'alert-danger', 'Oops! não foi possível cadastrar!');

        return redirect()->route('flock.index');
    }

    public function edit($id)
    {
        $title = 'Edit new Animal';
        $animals = Animal::find($id);

        return view('animals.flock.edit', compact('animals', 'title'));
    }

    public function update(Request $request, AuxAnimal $auxAnimal, $id)
    {
        $data = $auxAnimal->updateAnimalProfile($id, $request);
        $data = $auxAnimal->created_by($data);

        Animal::update($data);
    }

    public function destroy(Request $request, $id)
    {
        Animal::destroy($id);

        $mensagem = $request->mensagem;
        $request->session()->flash('alert-warning', 'Animal Deletado !',
            'alert-danger', 'Oops! não foi possível deletar!');

        return redirect()->route('admin.user.index')
            ->with('success', 'Animal removido!');
    }

    public function show($id)
    {
        $animal = Animal::find($id);
        return view('animals.flock.show', compact('animal'));
    }
}
