<?php

namespace App\Policies;

use App\Models\AccountTree;
use Modules\Erp\User\Models\User;

class AccountTreePolicy extends BasePolicy
{
    /**
     * Determine whether the user can view any models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_account_tree');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, AccountTree $accountTree)
    {
        return $user->can('view_account_tree', $accountTree);
    }

    /**
     * Determine whether the user can create models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_account_tree');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, AccountTree $accountTree)
    {
        return $user->can('update_account_tree', $accountTree);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, AccountTree $accountTree)
    {
        $accountTree->service()->notAllowDelete();

        return $user->can('delete_account_tree', $accountTree);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, AccountTree $accountTree)
    {
        return $user->can('restore_account_tree', $accountTree);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, AccountTree $accountTree)
    {
        return $user->can('force_delete_account_tree', $accountTree);
    }
}
