<?php

namespace App\Http\Requests;

use http\Env\Request;
use Illuminate\Foundation\Http\FormRequest;
use DateTime;

class FlockRequest extends FormRequest
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

    public function rules()
    {
        $atual = new DateTime();
        $hoje = $atual->format('Y-m-d');
//        dd($hoje);
        $validator = [
            'id' => 'required|unique:animals|numeric',
            'nome' => 'required|unique:animals|string',
            'dt_nascimento' => 'required|after_or_equal:2010/01/01|before_or_equal:' . $hoje,
            'sexo' => 'required',
            'classificacao' => 'required',
            'raca' => 'nullable',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif',
//            'roles' => 'required',
        ];
        return $validator;
    }

    public function messages()
    {
        return [
            'id.required' => 'O id é necessário ser preenchido corretamente com números somente!',
            'id.unique' => 'O id é o número de identificação do animal e deve ser único!'
                . 'Este número já está registrado no sistema!',
            'nome.required' => 'O nome é necessário! Se houve alum erro, pode ser que você tenha '
                . 'digitado um nome que já exista cadastrado no sistema',
            'dt_nascimento.required' => 'A data de Nascimento é necessária!'
                . 'Não use datas muito antigas como anteriores a 2001 e nem datas posteriores a de hoje',
            'sexo.required' => 'Campo sexo é necessário!',
            'classificacao.required' => 'Campo classificação é necessário!',
            'raca.required' => 'Campo raca é necessário!',
            'profile.image' => 'Selecione um arquivo de imagem válido no formato jpeg, jpg, png ou gif!',
            'profile.mimes:jpeg,png,jpg,gif' => 'Selecione um arquivo de imagem válido no formato jpeg, jpg, png ou gif!',
//            'profile.max:2048' => 'Selecione um arquivo com no máximo 2GB!',
//            'profile.min:1' => 'Este arquivo é muito pequeno!',
        ];
    }
}
