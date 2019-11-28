<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use DateTime;

class UserRepository
{
    public function createAdminUser($data, $avatar = null)
    {
        $data['password'] = Hash::make($data['password']);

        if ($avatar) {
            $data['thumbnail'] = Storage::disk('public')->put('users', $avatar);
        } else {
            $data['thumbnail'] = 'default.jpg';
        }

        $user = User::create($data);

        return $user;
    }

    public function createClientUser($data, $avatar = null)
    {
        $data['password'] = Hash::make($data['password']);

        if ($avatar) {
            $data['thumbnail'] = Storage::disk('public')->put('users/avatar', $avatar);
            $data['thumbnail'] = $avatar;
        } else {
            $data['thumbnail'] = 'default.jpg';
        }

        $data['farm_id'] = auth()->user()->id;
        $atual = new DateTime();
        $hoje = $atual->format('Y-m-d H:i:s');
        $data['email_verified_at'] = $hoje;

        $user = User::create($data);

        return $user;
    }

    public function updateProfileUser($data, $avatar = null)
    {
        if ($avatar) {
            $data['thumbnail'] = Storage::disk('public')->put('users/avatar', $avatar);
        } else {
            $data['thumbnail'] = 'default.jpg';
        }

        return $data;
    }

    public function updateAdminProfileUser($data, $avatar = null)
    {
        if ($avatar) {
            $data['thumbnail'] = Storage::disk('public')->put('users/avatar', $avatar);
        } else {
            $data['thumbnail'] = 'default.jpg';
        }
        $data['farm_id'] = auth()->user()->id;

        return $data;
    }

    public function updateUser($data, $avatar, $id)
    {
        $data['password'] = Hash::make($data['password']);

        if ($avatar) {
            Storage::disk('public')->delete(User::find($id)->thumbnail);
            $data['thumbnail'] = Storage::disk('public')->put('users/avatar', $avatar);
        }

        $user = User::find($id)->update($data);

        return $user;
    }

    public function updateProfileimage($data, $userRequest)
    {
//        $data = $userRequest->all();
        if ($userRequest->thumbnail != null) {
            $profile = $userRequest->file('thumbnail');
            request()->thumbnail->move('storage/profiles', $userRequest->name);
            $data = $userRequest->all();
            $data['thumbnail'] = $userRequest->name;
            return $data;
        } else {
            return self::profileDefault($data);
        }
    }
}
