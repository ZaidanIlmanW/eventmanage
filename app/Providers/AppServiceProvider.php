<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Policies\RolePolicy;
use App\Policies\PermissionPolicy;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;
use App\Models\User; // Pastikan ini adalah App\Models\User

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Pastikan untuk menggunakan App\Models\User di sini
        Gate::before(function (User $user, string $ability) {
            // Mengecek apakah pengguna adalah Super Admin
            return $user->isSuperAdmin() ? true : null;
        });

        // Menghubungkan Role dengan RolePolicy
        Gate::policy(Role::class, RolePolicy::class);

        // Menghubungkan Permission dengan PermissionPolicy
        Gate::policy(Permission::class, PermissionPolicy::class);
    }
}
