<?php
/**
 * Created by PhpStorm.
 * User: lucka
 * Date: 17/08/19
 * Time: 14:36
 */

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuxiliaryClass
{
    public function createProfile($request)
    {
        if ($request->profile != null) {
            $profile = $request->file('profile');
            request()->profile->move(public_path('profiles'), $request->name);
            $data = $request->all();
            $data['profile'] = $request->name;
            return $data;
        } else
            //da um jeito de aceitar uma imagem padrao
            return $php_errormsg;
    }

    public function updateProfile($request)
    {
        if ($request->profile != null) {
            $profile = $request->file('profile');
            request()->profile->move(public_path('profiles'), $request->name);
            $data = $request->all();
            $data['profile'] = $request->name;
            return $data;
        } else
            //mudar aki; fazer com que se não houver $request->profile == null
            //a foto do usuario seja mantida a original
            return $php_errormsg;
    }

    public function createUser($data, Request $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        $user->assignRole($request->input('roles'));

        if (!$user->hasRole(\App\Enums\UserRolesEnum::CLIENT)) {
            $user->assignRole(\App\Enums\UserRolesEnum::CLIENT);
        }

        return $data;
    }

    public function updateUser($data, $id, $request)
    {
        $model = $this->model->find($id);
        $email = $data['email'];
        if ($email != null) {
            $data['email'] = $request->email;
            $data['password'] = Hash::make($data['password']);
            return $data;
        } else {
            $data['email'] = $model->email;
            $data['password'] = Hash::make($data['password']);
            return $data;
        }
    }


}