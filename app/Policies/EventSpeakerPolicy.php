<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\EventSpeaker;
use App\Models\User;

class EventSpeakerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any EventSpeaker');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, EventSpeaker $eventspeaker): bool
    {
        return $user->checkPermissionTo('view EventSpeaker');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create EventSpeaker');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, EventSpeaker $eventspeaker): bool
    {
        return $user->checkPermissionTo('update EventSpeaker');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, EventSpeaker $eventspeaker): bool
    {
        return $user->checkPermissionTo('delete EventSpeaker');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any EventSpeaker');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, EventSpeaker $eventspeaker): bool
    {
        return $user->checkPermissionTo('restore EventSpeaker');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any EventSpeaker');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, EventSpeaker $eventspeaker): bool
    {
        return $user->checkPermissionTo('replicate EventSpeaker');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder EventSpeaker');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, EventSpeaker $eventspeaker): bool
    {
        return $user->checkPermissionTo('force-delete EventSpeaker');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any EventSpeaker');
    }
}
