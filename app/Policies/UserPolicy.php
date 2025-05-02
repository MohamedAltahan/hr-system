<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use Modules\Erp\User\Models\User;

class UserPolicy extends BasePolicy
{
    /**
     * Determine whether the user can view any models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_user');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, User $model)
    {
        return ! $model->is_super_admin && $user->can('view_user');
    }

    /**
     * Determine whether the user can create models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_user');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, User $model)
    {

        if ($user->is($model)) {
            return Response::deny(__('validation.unauthorized.update_user.self'), 406);
        }

        if ($model->is_super_admin) {
            return Response::deny(__('validation.unauthorized.update_user.super_admin'), 406);
        }

        if (! $user->can('update_user')) {
            return Response::deny(__('validation.unauthorized.update_user.update.permission'), 406);
        }

        return $user->isNot($model) && ! $model->is_super_admin && $user->can('update_user');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, User $model)
    {
        return $user->isNot($model) && ! $model->is_super_admin && $user->can('delete_user');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, User $model)
    {
        return $user->can('restore_user');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, User $model)
    {
        return $user->isNot($model) && ! $model->is_super_admin && $user->can('force_delete_user');
    }
}
