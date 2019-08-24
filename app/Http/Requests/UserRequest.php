<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:password_confirmation',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'roles' => 'required'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Preencha corretamente o campo Nome',
            'email.required' => 'Insira um endereço de email válido!',
            'password.required' => 'As senhas devem ser idênticas',
            'profile.required' => 'Por favor carregue um arquivo de imagem válido com os formatos jpeg,png,jpg,gif,svg',
        ];
    }
}
