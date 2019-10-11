<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CioRequest;
use App\Models\Cio;

use App\Services\AuxCio;
use App\Services\AuxAnimal;
use App\Models\Animal;

class CioController extends Controller
{
    private $paginate = 10;

    public function index()
    {
        $title = 'Cio';
        $cios = Cio::paginate($this->paginate);
        return view('animals.flock.cios.index', ['cios' => $cios], compact('title'));
    }

    public function create(Animal $animal, $id)
    {
        $title = 'Create new Animal';
        $animals = Animal::find($id)->all();
        foreach ($animals as $item) {
            $item->id;
        }
        return view('animals.flock.cios.create', compact('item', 'title'));
    }

    public function store(CioRequest $request, AuxCio $auxCio)
    {
        $data = $request->all();

        $data = $auxCio->managementFather($request, $data);
        $data = $auxCio->partoPrevisto($request, $data);
        $data = $auxCio->createCio($request, $data);

        $cios = Cio::create($data);


        return redirect()->route('cio.index');
    }

    public function show($id)
    {
        $title = 'Show Cio Details';
        $cios = Cio::find($id)->all();
        $animals = Animal::find($id)->all();
        foreach ($cios as $cio)
            $cio->id;
        foreach ($animals as $animal)
            $animal->profile;
        return view('animals.flock.cios.show', compact('cio', 'title', 'animal'));
    }

    public function edit()
    {
        $title = 'Edit Cio';
        $cios = Cio::all();
        foreach ($cios as $cio)
            $cio->id;
        $animals = Animal::all();
        foreach ($animals as $animal)
            $animal->id;
        return view('animals.flock.cios.edit', compact('cio', 'animal', 'title'));
    }

    public function update(CioRequest $request, Cio $cio, $id)
    {
        $cios = $cio->find($id)->all();
        $data = $request->all();
        $cios = $cio->update($data);
        return redirect()->route('cio.index');
    }

    public function destroy(CioRequest $request, $id)
    {
        $cios = Cio::find($id)->all();
        Cio::destroy($cios);

        $mensagem = $request->mensagem;
        $request->session()->flash('alert-warning', 'Cio Deletado !',
            'alert-danger', 'Oops! não foi possível deletar!');
    }
}
