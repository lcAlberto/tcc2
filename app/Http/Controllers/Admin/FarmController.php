<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Repositories\UserRepository;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\FarmRequest;
use App\Models\User;
use App\Models\Farm;

class FarmController extends Controller
{
    public function index(User $user, Farm $farm)
    {
        return redirect()->route('admin.user.index');
    }

    public function create()
    {
        $title = "Create";
        $roles = Role::pluck('name', 'name')->all();
        return view('farm.register', compact('roles', 'title'));
    }

    public function store(FarmRequest $request, Farm $farm, User $user)
    {
        $data = $request->validated();
        $data['id'] = auth()->user()->id;
        $data['auth_user'] = auth()->user()->id;
        $user->farm()->create($data);

        $mensagem = 'Fazenda cadastrada com sucesso!';
        $msg = $request->messages();
//        return redirect()->route('admin.user.index')->with('success', $mensagem);
        return view('farm.profile', compact('mensagem', 'msg'));
    }

    public function edit(Farm $farm, User $user)
    {
        $users = $user->all();
        $roles = Role::pluck('name', 'name')->all();
        return view('farm.edit', compact('roles', 'farm', 'users'));
    }

    public function update(Request $request, Farm $farm, User $user)
    {
        dd('aki');
        $data = $request->all();
        $id_ = auth()->user()->id;
        $data['id_users'] = $id_;
        $farm->create($data);

        $user->assignRole($request->input('roles'));

        if (!$user->hasRole(\App\Enums\UserRolesEnum::CLIENT)) {
            $user->assignRole(\App\Enums\UserRolesEnum::CLIENT);
        }

        return redirect()->route('admin.farm.index');
    }

    public function check(ProfileRequest $request, UserRepository $repository, User $user)
    {
        $data = $request->validated();
        $avatar = $request->file('thumbnail');
        $user = $repository->updateAdminProfileUser($data, $avatar);

        $data = auth()->user()->update($user);

        return back()->withStatus(__('Perfil atualizado com sucesso!'));
    }

    public function show()
    {
        dd('vc n deveria estar aki');
    }
}

