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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AuxiliaryClass
{
    public function createProfileImage($request)
    {
        if ($request->profile != null) {
            $profile = $request->file('profile');
            request()->profile->move('storage/profiles', $request->name);
            $data = $request->all();
            $data['profile'] = $request->name;
            return $data;
        } else
            $data = $request->all();
            return self::profileAuth($data);
    }

    public static function profileAuth($data)
    {
        $profileName = $data['name'];
        $profile = copy('default.jpg', 'storage/profiles/' . $profileName);
        $data['profile'] = $data['name'];

        return $data;

    }

    public function createUser($data, Request $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $data['id_farms'] = auth()->user()->id;

        $user = User::create($data);

        $user->assignRole($request->input('roles'));
        if (!$user->hasRole(\App\Enums\UserRolesEnum::CLIENT))
            $user->assignRole(\App\Enums\UserRolesEnum::CLIENT);

        return $data;
    }

    public function createProfile($data, Request $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        return $data;
    }

    public function updateUser($data, $request, $id)
    {
        if (empty($data['password']))
            $data = array_except($data, array('email'));
        if (!empty($input['email']))
            $data['password'] = Hash::make($data['password']);
        else
            $data = array_except($data, array('password'));

        $data['id_farms'] = auth()->user()->id;

        $user = User::find($id);
        $user->update($data);

        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));

        return $data;
    }

    public function updateProfileimage($request)
    {
        if ($request->profile != null) {
            $profile = $request->file('profile');
            request()->profile->move('storage/profiles', $request->name);
            $data = $request->all();
            $data['profile'] = $request->name;

            return $data;
        } else {
            $data = $request->all();
            return self::profileAuth($data);
        }
    }
}