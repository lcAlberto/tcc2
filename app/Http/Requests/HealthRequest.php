<?php

namespace App\Http\Requests;

use DateTime;
use Illuminate\Foundation\Http\FormRequest;

class HealthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'symptom' => 'nullable|string|required_if:update,false|min:4|max:255',
            'date_symptom' => 'nullable|required_if:update, false|date_format:"d/m/Y"|after_or_equal:01/01/2005|before_or_equal:end_of_treatment|before_or_equal:' . today()->format('d/m/Y'),
            'disease' => 'required|string|required_if:update,false|min:4|max:255',
            'causer_agent' => 'required|string|required_if:update,false|min:4|max:255',
            'start_of_treatment' => 'required|required_if:update, false|date_format:"d/m/Y"|after_or_equal:01/01/2005|before_or_equal:end_of_treatment|before_or_equal:' . today()->format('d/m/Y'),
            'end_of_treatment' => 'required|required_if:update, false|date_format:"d/m/Y"|after_or_equal:01/01/2005|before_or_equal:start_of_treatment|before_or_equal:' . today()->format('d/m/Y'),
            'treatment_type' => 'required|string|required_if:update,false|min:4|max:255',
            'medicament_id' => 'required|numeric',
            'animal_id' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'symptom.required' => 'Por favor, descreva o sintoma!',
            'date_symptom.required' => 'Qual a data do sintoma?',
            'disease.required' => 'Qual a data do sintoma?',
            'causer_agent.required' => 'Qual a possível casa?',
            'start_of_treatment.required' => 'Quando começou o tratamento?',
            'end_of_treatment.required' => 'Quando acabou o tratamento?',
            'treatment_type.required' => 'Qual o tipo do tratamento?',
        ];
    }
}
