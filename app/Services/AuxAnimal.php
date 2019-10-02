<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\FlockController;
use phpDocumentor\Reflection\Types\Self_;

Class AuxAnimal
{
    public function createAnimalProfile(Request $request)
    {
        if ($request->profile != null) {
            $profile = $request->file('profile');
            $profileName = time() . '-' . request()->profile->getClientOriginalName();
            request()->profile->move(public_path('animals'), $profileName);
            $data = $request->all();
            $data['profile'] = $profileName;
            return $data;
        } else
            $data = $request->all();
        return AuxiliaryClass::profileDefault();
    }

    public function updateAnimalProfile($id, $request)
    {
        if ($request->profile != null) {
            $profile = $request->file('profile');
            $profileName = time() . '-' . request()->profile->getClientOriginalName();
            request()->profile->move(public_path('animals'), $profileName);
            $data = $request->all();
            $data['profile'] = $profileName;
            return $data;
        }
    }

    public function idadeAnimal(Request $request, $data)
    {
        $dt_nascimento = $request->dt_nascimento;
        $idade = floor((time() - strtotime($dt_nascimento)) / 31556926);
        $age = (string)$idade;
        $data['idade'] = $age;
        $this->created_by($data);

        return $data;
    }

    public function created_by($data)
    {
        $created_by = auth()->user()->id;
        $created_by = (string)$created_by;
        $data['created_by'] = $created_by;

        return $data;
    }
}
