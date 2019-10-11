<?php

namespace App\Repositories;

use App\Models\User;
use App\Base\Repository;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserRepository extends Repository
{

    protected function getClass()
    {
        return User::class;
    }

    public function createUser($data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->model->create($data);
    }

    public function updateUser($data, $id, UserRequest $request)
    {
        $model = $this->model->find($id);
        $email = $data['email'];
        if ($email != null) {
            $data['email'] = $request->email;
            $data['password'] = Hash::make($data['password']);
            return $model->update($data);
        } else {
            $data['email'] = $model->email;
            $data['password'] = Hash::make($data['password']);
            return $model->update($data);
        }
    }
    /*
    public function updateProfile($data, $id, UserRequest $request)
    {
        $model = $this->model->find($id);
        $email = $data['email'];
        if ($email != null) {
            $data['email'] = $request->email;
            $data['password'] = Hash::make($data['password']);
            return $model->update($data);
        } else {
            $data['email'] = $model->email;
            $data['password'] = Hash::make($data['password']);
            return $model->update($data);
        }
    }*/
}
