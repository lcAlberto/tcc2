<?php

namespace App\Services;

use App\Http\Requests\FlockRequest;
use App\Models\Farm;
use Illuminate\Http\Request;
use DateTime;
use function GuzzleHttp\Promise\all;

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

    public function validationDt_nasc(Request $request, $data)
    {
        $atual = new DateTime();
        $hoje = $atual->format('Y/m/d');
        $dt_nascimento = $request->dt_nascimento;
        if ($dt_nascimento > $hoje) {
            return $this->idadeAnimal();
        } else if ($dt_nascimento < $hoje)
            return redirect()->route('flock.index')->with($php_errormsg = "Future_Dt_nascimento");
    }

    public function idadeAnimal(Request $request, $data)
    {
        $atual = new DateTime();
        $hoje = $atual->format('Y/m/d');
        $dt_nascimento = $request->dt_nascimento;
        if ($dt_nascimento > $hoje) {
            $dt_nascimento = $request->dt_nascimento;
            $idade = floor((time() - strtotime($dt_nascimento)) / 31556926);
            $age = (string)$idade;

            $data['idade'] = $age;
            $this->created_by($data);
        }

        return $data;
    }

    public static function created_by($data)
    {
        $created_by = auth()->user()->id . '-' . auth()->user()->name;
        $created_by = (string)$created_by;
        $data['created_by'] = $created_by;

        return $data;
    }

    public function farm_by($data)
    {
        $farms = Farm::find(auth()->user()->id_farms);
        $farms = $farms->all();
        foreach ($farms as $farm) {
            $farm->id;
        }
        $data['id_farms'] = $farm->id;

        return $data;
    }
}
