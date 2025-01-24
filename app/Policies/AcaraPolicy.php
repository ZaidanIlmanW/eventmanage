<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Acara;
use App\Models\User;

class AcaraPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Acara');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Acara $acara): bool
    {
        return $user->checkPermissionTo('view Acara');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Acara');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Acara $acara): bool
    {
        return $user->checkPermissionTo('update Acara');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Acara $acara): bool
    {
        return $user->checkPermissionTo('delete Acara');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any Acara');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Acara $acara): bool
    {
        return $user->checkPermissionTo('restore Acara');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any Acara');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, Acara $acara): bool
    {
        return $user->checkPermissionTo('replicate Acara');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder Acara');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Acara $acara): bool
    {
        return $user->checkPermissionTo('force-delete Acara');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Acara');
    }
}
