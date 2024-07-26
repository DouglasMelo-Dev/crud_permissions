<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);

        Gate::define('pode_ver', function (User $user)
        {
            return $user->id === 12;
        });

        Gate::define('is_admin', function (User $user) {
            // Verificar se o usuário pertence ao grupo 'admin'
            return $user->groups()->where('name', 'admin')->exists();
        });
    }
}
