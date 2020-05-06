<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

class ProfileController extends Controller
{
    public function edit($id)
    {
        return view('profile.edit');
    }

    public function update(ProfileRequest $request, UserRepository $repository, User $user)
    {
        $data = $request->validated();
        $avatar = $request->file('thumbnail');
        $user_id =  User::find(auth()->user()->id);
        if(!isset($user_id->farm_id)){
            $user = $repository->updateAdminProfile($data, $avatar);
        }else{
            $user = $repository->updateProfileUser($data, $avatar);
        }
        $data = auth()->user()->update($user);

        return back()->withStatus(__('Perfil atualizado com sucesso!'));
    }

    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Senha alterada com sucesso!'));
    }
}
