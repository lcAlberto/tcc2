<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Farm;
use App\Services\AuxiliaryClass;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request, Farm $farm)
    {
        $title = 'Users';
        $farms = $farm->all();

        $users = User::orderBy('id', 'DESC')->paginate(5);

        return view('users.index', compact('users', 'farms', 'title'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $title = 'CreateUser';
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles', 'title'));
    }

    public function store(Request $request, AuxiliaryClass $auxiliaryClass)
    {
        $data = $auxiliaryClass->createProfileImage($request);
        $user = $auxiliaryClass->createUser($data, $request);

        $mensagem = $request->mensagem;
        $request->session()->flash('alert-primary', 'Usuário Cadastrado!',
            'alert-danger', 'Oops! não foi possível cadastrar!');

        return redirect()->route('admin.user.index')
            ->with('success', 'User created successfully');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    public function update(Request $request, AuxiliaryClass $auxiliaryClass, $id)
    {
        $data = $auxiliaryClass->createProfileImage($request);
        $user = $auxiliaryClass->updateUser($data, $request, $id);

        $mensagem = $request->mensagem;
        $request->session()->flash('alert-sucess', 'Usuário Atualizado!',
            'alert-danger', 'Oops! não foi possível Atualizar!');

        return redirect()->route('admin.user.index')
            ->with('success', 'User updated successfully');
    }

    public function destroy(Request $request, $id)
    {
        User::destroy($id);

        $mensagem = $request->mensagem;
        $request->session()->flash('alert-warning', 'Usuário Deletado !',
            'alert-danger', 'Oops! não foi possível deletar!');

        return redirect()->route('admin.user.index')
            ->with('success', 'User deleted successfully');
    }
}