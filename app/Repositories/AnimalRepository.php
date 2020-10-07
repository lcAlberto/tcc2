<?php

namespace App\Services;

use App\Enums\AnimalPhaseEnum;
use App\Http\Requests\CioRequest;
use App\Http\Requests\FlockRequest;
use App\Models\Animal;
use Illuminate\Http\Request;
use DateTime;
use App\Repositories\UserRepository;
use App\Enums\AnimalStatusEnum;
use App\Enums\AnimalSexEnum;
use App\Enums\AnimalClassEnum;

class AnimalRepository
{

    public function createAnimalProfile($request)
    {
        $data = $request->all();
        if ($request->thumbnail != null) {
            request()->thumbnail->move(public_path('animals/'),
                $request->name);
            $data['thumbnail'] = $request->name . '.' .
                $request->file('thumbnail')->getClientOriginalExtension();
        }
        return $data;
    }

    public function updateAnimalProfile($current, $request)
    {
        $data = $request->all();
        if (isset($data['thumbnail'])) {
            $this->createAnimalProfile($request);
        } else if (isset($current->thumbnail))
            $data['thumbnail'] = $current->thumbnail;
        return $data;
    }

    public function validationOfBorn_date($data)
    {
        $data['born_date'] = date('Y-m-d H:i:s', strtotime($data['born_date']));

        return $data;
    }

    public static function ageCalculation(Request $request, $data)
    {
        $atual = new DateTime();
        $hoje = $atual->format('Y/m/d');
        $born_date = $request->born_date;
        if (($born_date < $hoje) && ($born_date > 0)) {
            $born_date = $request->born_date;
            $idade = floor((time() - strtotime($born_date)) / 31556926);

            return $idade;
        }
        $erro = 'Data inválida';
        return $erro;
    }

    public static function created_by($data)
    {
        $data['user_id'] = auth()->user()->id;

        return $data;
    }

    public function created_by_user($data)
    {
        $data['user_id'] = auth()->user()->id;

        return $data;
    }

    public function farm_by($data)
    {
        $data['farm_id'] = auth()->user()->farm_id;

        return $data;
    }
}
