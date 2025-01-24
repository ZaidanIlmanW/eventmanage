<?php

namespace App\Policies;

use Spatie\Permission\Models\Permission;
use App\Models\User;


class PermissionPolicy
{
    /**
     * Tentukan apakah user dapat melihat data Permission.
     */
    public function view(User $user, Permission $permission)
    {
        // Logika otorisasi
        return $user->hasPermissionTo('view-permission');
    }

    /**
     * Tentukan apakah user dapat membuat data Permission.
     */
    public function create(User $user)
    {
        // Logika otorisasi
        return $user->hasPermissionTo('create-permission');
    }

    /**
     * Tentukan apakah user dapat menghapus data Permission.
     */
    public function delete(User $user, Permission $permission)
    {
        // Logika otorisasi
        return $user->hasPermissionTo('delete-permission');
    }
}