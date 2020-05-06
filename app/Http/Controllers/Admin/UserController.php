<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Farm;
use App\Repositories\UserRepository;
use App\Http\Requests\UserRequest;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use App\Enums\UserRolesEnum;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $title = 'User';

        /*Retorna a fazenda cujo usuario pertence*/
        $farm = Farm::find(auth()->user()->id);

        /* Retorna todos os usuarios da fazenda  */
        $users = Farm::find(auth()->user()->id)->users;


        return view('users.index', compact('farm', 'users', 'title'))
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
        $userRole = $user->roles->pluck('name', 'name')->all();

        $mensagem = 'Usuário cadastrado com sucesso!';
        return redirect()->route('admin.user.index')->with('success', $mensagem, $userRole);
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

        $mensagem = $userRequest->mensagem;
        $userRequest->session()->flash('alert-success', 'Usuário Atualizado!',
            'alert-danger', 'Oops! não foi possível atualizar!');
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

    public function search(Request $request, UserRepository $userRepository)
    {
        $title = 'search';
        $farm = Farm::find(auth()->user()->id);
        $users = DB::table('users')
            ->where('name', 'ilike', '%' . $request->search . '%')
            ->orWhere('email', 'ilike', '%' . $request->search . '%')
            ->orWhere('phone', 'ilike', '%' . $request->search . '%')
            ->orWhere('farm_id', 'ilike', '%' . $request->search . '%')
            ->get();

        return view('users.index', compact(['users'], 'title', 'farm'));
    }
}
