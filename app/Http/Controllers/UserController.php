<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;

class UserController extends Controller
{
    public readonly User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        /* $users = $this->user->with('companies')->get();
        return view('users', ['users' => $users]); */

        $users = User::with(['companies', 'groups.permissions'])->get();
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        /* dd('teste');
        $users = User::all();
        return view('index', compact('users')); */

        $user = User::with(['companies', 'groups.permissions'])->findOrFail($id);
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
