<?php

namespace App\Policies;

use App\Models\TemporaryUpload;
use Modules\Erp\User\Models\User;

class TemporaryUploadPolicy extends BasePolicy
{
    /**
     * Determine whether the user can view any models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_temporary_upload');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, TemporaryUpload $temporaryUpload)
    {
        return $user->can('view_temporary_upload');
    }

    /**
     * Determine whether the user can create models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_temporary_upload');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, TemporaryUpload $temporaryUpload)
    {
        return $user->can('update_temporary_upload');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, TemporaryUpload $temporaryUpload)
    {
        return $user->can('delete_temporary_upload');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, TemporaryUpload $temporaryUpload)
    {
        return $user->can('restore_temporary_upload');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, TemporaryUpload $temporaryUpload)
    {
        return $user->can('force_delete_temporary_upload');
    }
}
