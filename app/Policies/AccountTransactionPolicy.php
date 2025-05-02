<?php

namespace App\Policies;

use App\Models\AccountTransaction;
use Modules\Erp\User\Models\User;

class AccountTransactionPolicy extends BasePolicy
{
    /**
     * Determine whether the user can view any models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_account_transaction');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, AccountTransaction $accountTransaction)
    {
        return $user->can('view_account_transaction', $accountTransaction);
    }

    /**
     * Determine whether the user can create models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_account_transaction');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, AccountTransaction $accountTransaction)
    {
        return $user->can('update_account_transaction', $accountTransaction);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, AccountTransaction $accountTransaction)
    {
        return $user->can('delete_account_transaction', $accountTransaction);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, AccountTransaction $accountTransaction)
    {
        return $user->can('restore_account_transaction', $accountTransaction);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, AccountTransaction $accountTransaction)
    {
        return $user->can('force_delete_account_transaction', $accountTransaction);
    }
}
