<?php

namespace App\Policies;

use App\Models\AccountingInitialBalance;
use Modules\Erp\User\Models\User;

class AccountingInitialBalancePolicy extends BasePolicy
{
    /**
     * Determine whether the user can view any models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_accounting_initial_balance');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\AccountingInitialBalance  $accountingInitialBalance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        return $user->can('view_accounting_initial_balance');
    }

    /**
     * Determine whether the user can create models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_accounting_initial_balance');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\AccountingInitialBalance  $accountingInitialBalance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        return $user->can('update_accounting_initial_balance');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\AccountingInitialBalance  $accountingInitialBalance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        return $user->can('delete_accounting_initial_balance');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, AccountingInitialBalance $accountingInitialBalance)
    {
        return $user->can('restore_accounting_initial_balance');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, AccountingInitialBalance $accountingInitialBalance)
    {
        return $user->can('force_delete_accounting_initial_balance');
    }
}
