<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;



class UserController extends Controller
{
    use AuthorizesRequests;
    public readonly User $user;

    public function __construct()
    {
        $this->user = new User();
        //$this->middleware('admin')->only(['create', 'store', 'edit', 'update', 'destroy']);

    }

    public function index()
    {
        // Obtendo o usuário logado
        $loggedUser = Auth::user();

        // Carregando os usuários que pertencem à mesma empresa do usuário logado
        $users = User::with(['companies', 'groups.permissions'])
            ->whereHas('companies', function ($query) use ($loggedUser) {
                $query->whereIn('companies.id', $loggedUser->companies->pluck('id'));
            })
            ->get();

        return view('users', ['users' => $users]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $created = $this->user->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => password_hash($request->input('password'), PASSWORD_DEFAULT),
        ]);

        if($created){
            return redirect()->back()->with('message', 'Usuário cadastrado com sucesso!');
        }else{
            return redirect()->back()->with('message', 'Erro: Usuário não foi cadastrado.');
        }
    }

    public function show(string $id)
    {
        // Obtendo o usuário logado
        $loggedUser = Auth::user();

        // Carregando o usuário específico se ele pertencer à mesma empresa do usuário logado
        $user = User::with(['companies', 'groups.permissions'])
            ->where('id', $id)
            ->whereHas('companies', function ($query) use ($loggedUser) {
                $query->whereIn('companies.id', $loggedUser->companies->pluck('id'));
            })
            ->firstOrFail();

        $this->authorize('view', $user); // funcao da UserPolicies

        return view('user_show', ['user' => $user]);
    }

    public function edit(string $id)
    {
        $id = User::findOrFail($id);

        $this->authorize('update', $id); // funcao da UserPolicies

        return view('user_edit', ['user' => $id]);
    }

    public function update(Request $request, string $id)
    {
        /* echo '<pre>';
        print_r($request->all()); */

        $updated = $this->user->where('id', $id)->update($request->except(['_token', '_method']));

        if($updated){
            return redirect()->back()->with('message', 'Cadastro atualizado com sucesso!');
        }else{
            return redirect()->back()->with('message', 'Repita a operação. Cadastro não foi atualizado.');
        }
    }

    public function destroy(string $id)
    {
        $userDel = User::findOrFail($id);

        $userDel->delete();

        if($userDel){
            return redirect()->back()->with('message', 'Cadastro deletado com sucesso');
        }else{
            return redirect()->back()->with('message', 'Repita a operação. Cadastro não foi excluído.');
        }
    }

    public function showGroupsAndPermissions()
    {
        $loggedUser = Auth::user();

         // o usuário tem pelo menos uma empresa associada
        if ($loggedUser->companies->isEmpty()) {
            return redirect()->back()->with('error', 'Usuário não associado a nenhuma empresa.');
        }

        // Obtendo o ID da primeira empresa associada ao usuário
        $companyId = $loggedUser->companies->first()->id;

        // Obtendo grupos e permissões da empresa
        $groups = Group::with('permissions')->where('company_id', $companyId)->get();

        /* dd($groups); */
        return view('groups_permissions', ['groups' => $groups]);
    }

    // Obtem as permissões por grupos
    public function showUsersFromSameCompany()
    {
        $authUser = Auth::user();
        $companyId = $authUser->companies()->first()->id;

        $users = User::select(
            'users.id as user_id',
            'users.name as user_name',
            'users.email as user_email',
            'modules.description as module_description',
            'modules.id as module_id',
            'permissions.id as permission_id',
            'permissions.description as permission_description'
        )
        ->join('user_company', 'user_company.user_id', '=', 'users.id')
        ->join('companies', 'companies.id', '=', 'user_company.company_id')
        ->join('user_group', 'user_group.user_id', '=', 'users.id')
        ->join('groups', 'groups.id', '=', 'user_group.group_id')
        ->join('group_permission', 'group_permission.group_id', '=', 'groups.id')
        ->join('module_permission', 'module_permission.id', '=', 'group_permission.module_permission_id')
        ->join('permissions', 'permissions.id', '=', 'module_permission.permission_id')
        ->join('modules', 'modules.id', '=', 'module_permission.module_id')
        ->where('companies.id', $companyId)
        ->get();

        return view('users_from_company', ['users' => $users]);
    }

}
