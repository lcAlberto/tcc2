<?php

namespace App\Repositories;

//use http\Env\Request;
use App\Http\Requests\CioRequest;
use App\Services\AnimalRepository;

Class HealthRepository
{
    public function preventiveTreatment($data)
    {
        if ($data['treatment_type'] == 'preventive'){
            $data['sintoma'] = null;
            $data['date_symptom'] = null;
        }
        return $data;
    }
}
