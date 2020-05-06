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
        $data['thumbnail'] = 'default.jpg';
        $user = User::create($data);
        return $user;
    }

    public function createClientUser($data, $avatar = null)
    {
        $data['password'] = Hash::make($data['password']);

        if ($avatar) {
            $data['thumbnail'] = $avatar->getClientOriginalName();
            request()->thumbnail->move(public_path() . '/profile', $data['thumbnail']);
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
            $data['thumbnail'] = $avatar->getClientOriginalName();
            request()->thumbnail->move(public_path() . '/profile', $data['thumbnail']);
        } else {
            $data['thumbnail'] = 'default.jpg';
        }
//        }if ($avatar) {
//            $data['thumbnail'] = Storage::disk('public')->put('users/avatar', $avatar);
//        } else {
//            $data['thumbnail'] = 'default.jpg';
//        }

        return $data;
    }

    public function updateAdminProfile($data, $avatar)
    {
        if ($avatar) {
            $data['thumbnail'] = $avatar->getClientOriginalName();
            request()->thumbnail->move(public_path() . '/profile', $data['thumbnail']);
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
            $data['thumbnail'] = $avatar->getClientOriginalName();
            request()->thumbnail->move(public_path() . '/profile', $data['thumbnail']);
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

    public static function profileDefault($data)
    {
        $profileName = $data['name'];
        $profile = copy('default.jpg', public_path() . '/profile' . $profileName);
        $data['thumbnail'] = $data['name'];
        return $data;
    }

    /*QUERYS*/

    public function queryOutput($querys)
    {
        $users = "";
        if ($querys) {
            foreach ($querys as $key => $user) {
                if ($user->farm_id == auth()->user()->farm_id) {
                    $users = '<tr class="text-center">' .
                        '<td><img src="' . asset('/profile/' . $user->thumbnail) . '" alt="image" width="50" height="50" class="rounded"></td>' .
                        '<td>' . $user->name . '</td>' .
                        '<td> <a href="mailto:' . $user->email . '">' . $user->email . '</a>' . '</td>' .
                        '<td>' . $user->phone . '</td>' .
                        '<td> ROLES </td>' .
                        '<td class="btn-group">
                                <a class="btn btn-group btn-primary" href="' . route('user.index', $user->id) . '">
                                    <i class="fa fa-arrow-right"></i>
                                </a>' .
                        ' </td > ' .
                        '</tr > ';
                }
            }
        }
//        echo $users;
        return $users;
    }
}
