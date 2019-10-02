<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cio;

//use App\Models\Cow;
//use App\Models\Bull;
use App\Services\AuxAnimal;
use App\Models\Animal;
use Carbon\Carbon;

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

    public function store(Request $request, AuxAnimal $animal)
    {
        $data = $request->all();
        $status = 'pendente';
        $data['status'] = $status;
        $data = $animal->created_by($data);
        $partoPrevisto = date('Y-m-d', strtotime('+280 days', strtotime($data['dt_cobertura'])));
        $data['dt_parto_previsto'] = $partoPrevisto;

        $cios = Cio::create($data);
    }

    public function show($id)
    {
        $title = 'Show Cio Details';
        $cios = Cio::find($id)->all();
        $animals = Animal::find($id)->all();
        foreach($cios as $cio)
            $cio->id;
        foreach ($animals as $animal)
            $animal->profile;
        return view('animals.flock.cios.show', compact('cio', 'title', 'animal'));
    }
}
