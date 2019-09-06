<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|unique|numeric',
            'nome' => 'required|unique|string',
            'birth' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:password_confirmation',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'roles' => 'required'
        ];
    }
}
