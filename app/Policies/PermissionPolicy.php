<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;


class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the user can view the resource.
     *
     * @param  \App\Models\User  $user
     * @param  string  $permission
     * @return bool
     */
    public function view(User $user, string $permission)
    {
        return $user->hasPermission($permission);
    }

    /**
     * Determine if the user can create the resource.
     *
     * @param  \App\Models\User  $user
     * @param  string  $permission
     * @return bool
     */
    public function create(User $user, string $permission)
    {
        return $user->hasPermission($permission);
    }

    // Defina outros métodos conforme necessário
}
