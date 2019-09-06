<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FlockRequest;
use App\Models\Animal;

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

    public function store(FlockRequest $request, UploadServices $profile,
                          FlockRepository $repository, FlockValidation $flockValidation)
    {
//        $validation = $flockValidation->valInputs($request);
//        dd($request->all());
        $createProfile = $profile->createAnimalProfile($request);
        $createAge = $profile->ageAnimal($request, $createProfile);
//        dd($createAge);
        $animals = $repository->createAnimal($createAge);

        $animals->save();
        $mensagem = $request->mensagem;
        $request->session()->flash('alert-success', 'Animal cadastrado!',
            'alert-danger', 'Oops! não foi possível cadastrar!');

        return redirect()->route('flock.index');
    }
}
