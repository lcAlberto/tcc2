<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Farm;

class FarmController extends Controller
{
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('farm.register', compact('roles'));
    }

    public function store(Request $request, Farm $farm, User $user)
    {
        $data = $request->all();
        $id_ = auth()->user()->id;
        $id_users = $user->find($id_);
        dd($id_users);

        foreach ($id_users as $id) {
            dd('ok');
        }
        dd($id_users->all());
        $data['id_users'] = $id_users;
        $farm->create($data);

        $user->assignRole($request->input('roles'));

        if (!$user->hasRole(\App\Enums\UserRolesEnum::CLIENT)) {
            $user->assignRole(\App\Enums\UserRolesEnum::CLIENT);
        }

        return redirect()->route('admin.user.index');
    }
}

