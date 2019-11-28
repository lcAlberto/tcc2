<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Farm;
use App\Repositories\UserRepository;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use App\Enums\UserRolesEnum;

class UserController extends Controller
{
    public function index(Request $request, User $user, Farm $farm)
    {
        $title = 'User';
        $users = $farm->users()->paginate(5);
        $farms = $farm->all();
        foreach ($farms as $farm_item) {
            $farm_item->id;
        }
        $users = User::orderBy('id', 'DESC')->paginate(5);

        return view('users.index', compact('users', 'farms', 'farm_item', 'title'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $title = 'CreateUser';
        $roles = Role::pluck('name', 'name')->all();

        return view('users.create', compact('roles', 'title'));
    }

    public function store(UserRequest $userRequest, UserRepository $repository, User $user, Farm $farm)
    {
        $data = $userRequest->validated();
        $avatar = $userRequest->file('thumbnail');
        $users = $repository->createClientUser($data, $avatar);

        $mensagem = 'Usuário cadastrado com sucesso!';
        return redirect()->route('admin.user.index')->with('success', $mensagem);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    public function update(UserRequest $userRequest, UserRepository $repository, $id)
    {
        $data = $userRequest->validated();
        $avatar = $userRequest->file('thumbnail');
        $user = $repository->updateUser($data, $avatar, $id);

        $mensagem = 'Usuário cadastrado com sucesso!';
        return redirect()->route('admin.user.index')->with('success', $mensagem);
    }

    public function destroy(User $user, Request $request, $id)
    {
        $users = User::find($id);
        if ($users->thumbnail)
            Storage::disk('public')->delete($users->thumbnail);
        User::destroy($id);

        $mensagem = $request->mensagem;
        $request->session()->flash('alert-warning', 'Usuário Deletado !',
            'alert-danger', 'Oops! não foi possível deletar!');

        return redirect()->route('admin.user.index')
            ->with('success', 'User deleted successfully');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function search(Request $request, User $user)
    {
        $title = 'search';
        $dataForm = $request->all();
        $users = $user->search($dataForm);

        $farms = Farm::all();
        foreach ($farms as $farm_item) {
            $farm_item->id;
        }

        return view('users.index', compact(['users'], 'title', 'farms', 'farm_item'));
//        return view('users.index', compact(['users'], 'title'));
    }
}
