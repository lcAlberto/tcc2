<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use DateTime;

class CioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $atual = new DateTime();
        $hoje = $atual->format('Y-m-d');
        $validator = [
            'id_animals' => 'required',
            'dt_cio' => 'required|before:' . $hoje,
            'dt_cobertura' => 'required|after_or_equal:2010/01/01|after_or_equal:dt_cio',
            'tipo' => 'required|string',
            'pai' => 'nullable',
            'pai_id' => 'nullable|integer',
            'pai_name' => 'required|string',
        ];

        return $validator;
    }

    public function messages()
    {
        return [
            'id_animals:required' => 'Campo ID é necessário',
            'dt_cio:required' => 'O campo Data do cio é necessário',
            'dt_cio:before' => 'Não é possível registrar um cio que ainda não aconteceu!',
            'dt_cobertura:required' => 'O campo Data da Cobertura é necessário',
            'dt_cobertura:after_or_equal:dt_cio' => 'Não é possível que a cobertura foi antes do cio!'
                .'É recomendavel que seja no mesmo dia',
            'tipo:required' => 'O campo Tipo da Cobertura é necessário',
            'pai:required' => 'O campo Pai da Cobertura é necessário',
            'pai_id:required' => 'O campo ID do Touro é necessário',
            'pai_name:required' => 'O campo Nome do Touro é necessário',
        ];
    }
}
