<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Medicament;

class MedicamentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:medicaments|required_if:update,false|string|min:4|max:255',//unique:medicaments|
            'active_principle' => 'required|string|required_if:update,false|min:4|max:255',
            'grace_period_beef' => 'required|string|required_if:update,false|min:1|max:255',
            'grace_period_dairy' => 'required|string|required_if:update,false|min:1|max:255',
            'flyer' => 'nullable|mimes:pdf,doc,docx,odx,ppt|max:2048|min:1',//required_if:update,false
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|min:1',
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Já existe um medicamento com esse nome!',
            'name.min:4' => 'Por favor, preencha este campo com pelo menos 5 caracteres',
            'name.max:255' => 'Por favor, pPor favor, preencha este campo com no máximo 255 caracteres',

            'active_principle.min:4' => 'Por favor, preencha este campo com pelo menos 5 caracteres',
            'active_principle.max:255' => 'Por favor, preencha este campo com no máximo 255 caracteres',

            'laboratory.min:4' => 'Por favor, preencha este campo com pelo menos 5 caracteres',
            'laboratory.max:255' => 'Por favor, preencha este campo com no máximo 255 caracteres',

            'grace_period_beef.min:1' => 'Por favor, preencha este campo com pelo menos 1 caractere',
            'grace_period_beef.max:255' => 'Por favor, preencha este campo com no máximo 255 caracteres',

            'grace_period_dairy.min:1' => 'Por favor, preencha este campo com pelo menos 1 caractere',
            'grace_period_dairy.max:255' => 'Por favor, preencha este campo com no máximo 255 caracteres',

            'flyer.mimes:jpeg,png,jpg,gif' => 'Selecione um arquivo de imagem válido no formato jpeg, jpg, png ou gif!',
            'flyer.max:2048' => 'Selecione um arquivo com no máximo 2GB!',
            'flyer.min:1' => 'Este arquivo é muito pequeno!',

            'thumbnail.image' => 'Selecione um arquivo de imagem válido no formato jpeg, jpg, png ou gif!',
            'thumbnail.mimes:pdf,doc,docx,pptx,ppt' => 'Selecione um arquivo de imagem válido no formato pdf, doc, docx, pptx, ppt!',
            'thumbnail.max:2048' => 'Selecione um arquivo com no máximo 2GB!',
            'thumbnail.min:1' => 'Este arquivo é muito pequeno!',
        ];
    }
}
