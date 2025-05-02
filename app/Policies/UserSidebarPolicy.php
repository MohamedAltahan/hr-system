<?php

namespace App\Policies;

use Modules\Erp\User\Models\User;
use Modules\Erp\User\Models\UserSidebar;

class UserSidebarPolicy extends BasePolicy
{
    /**
     * Determine whether the user can view any models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_user_sidebar');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, UserSidebar $userSidebar)
    {
        return $user->can('view_user_sidebar');
    }

    /**
     * Determine whether the user can create models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_user_sidebar');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, UserSidebar $userSidebar)
    {
        return $user->can('update_user_sidebar');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, UserSidebar $userSidebar)
    {
        return $user->can('delete_user_sidebar');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, UserSidebar $userSidebar)
    {
        return $user->can('restore_user_sidebar');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, UserSidebar $userSidebar)
    {
        return $user->can('force_delete_user_sidebar');
    }
}
