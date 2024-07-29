<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public readonly User $user;

    public function __construct()
    {
        $this->user = new User();
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
        //
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

        return view('user_show', ['user' => $user]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
