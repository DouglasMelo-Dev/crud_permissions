<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization; // incluir esta linha em qualquer nova policies


class UserPolicy
{
    use HandlesAuthorization; // incluir esta linha em qualquer nova policies

    public function viewAny(User $user)
    {
        return $user->hasPermission('view_any_user');
    }

    public function view(User $user, User $model)
    {
        //dd($user->id);//teste para permitir que o usuario veja seu proprio perfil ou se for admin
        return $user->id === $model->id || $user->hasPermission('view_user');
    }

    public function create(User $user)
    {
        return $user->hasPermission('create_user');
    }

    public function update(User $user, User $model)
    {
        // Permitir que o usuário atualize seu próprio perfil ou se for admin
        return $user->id === $model->id || $user->hasPermission('update_user');
    }

    public function delete(User $user, User $model)
    {
        return $user->id === $model->id || $user->hasPermission('delete_user');
    }
}
