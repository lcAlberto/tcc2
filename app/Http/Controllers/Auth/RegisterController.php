<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use http\Env\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

use App\Services\AuxiliaryClass;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/farm/create';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'min:5', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'profile' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo é Necessário',
            'name.string' => 'Por favor entre com um nome válido',
            'name.min:5' => 'Entre com um nome com no mínimo 5 caracteres',
            'name.max:255' => 'Entre com um nome com no máximo 255 caracteres',
            'password.required' => 'Digite a senha com no mínimo 8 caracteres',
            'password.min:8' => 'Digite a senha com no mínimo 8 caracteres',
        ];
    }


    protected function create(array $data)
    {
        if (!isset($data['profile'])) {
            $imgName = AuxiliaryClass::profileDefault($data);
            $data['profile'] = 'profile';
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'profile' => $data['profile'],
        ]);

        if (!$user->hasRole(\App\Enums\UserRolesEnum::ADMIN)) {
            $user->assignRole(\App\Enums\UserRolesEnum::ADMIN);
        }

        return $user;
    }
}
