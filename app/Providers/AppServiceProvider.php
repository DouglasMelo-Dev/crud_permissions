<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\User;
use App\Policies\PermissionPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;



class AppServiceProvider extends ServiceProvider
{

    protected $policies = [
        User::class => UserPolicy::class,
        Permission::class => PermissionPolicy::class,
    ];

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->registerPolicies();

        Schema::defaultStringLength(191);

        Gate::define('pode_ver', function (User $user)
        {
            return $user->id === 12;
        });

        Gate::define('is_admin', function (User $user) {
            // Verificar se o usuário pertence ao grupo 'admin'
            return $user->groups()->where('name', 'admin')->exists();
        });

        // Registrar as regras de permissão
        Gate::define('view', [UserPolicy::class, 'view']);
        Gate::define('create', [UserPolicy::class, 'create']);
    }
}
