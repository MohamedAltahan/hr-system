<?php

namespace App\Policies;

use App\Models\AccountingInitialBalanceItem;
use Modules\Erp\User\Models\User;

class AccountingInitialBalanceItemPolicy extends BasePolicy
{
    /**
     * Determine whether the user can view any models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_accounting_initial_balance_item');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, AccountingInitialBalanceItem $accountingInitialBalanceItem)
    {
        return $user->can('view_accounting_initial_balance_item', $accountingInitialBalanceItem);
    }

    /**
     * Determine whether the user can create models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_accounting_initial_balance_item');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, AccountingInitialBalanceItem $accountingInitialBalanceItem)
    {
        return $user->can('update_accounting_initial_balance_item', $accountingInitialBalanceItem);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, AccountingInitialBalanceItem $accountingInitialBalanceItem)
    {
        return $user->can('delete_accounting_initial_balance_item', $accountingInitialBalanceItem);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, AccountingInitialBalanceItem $accountingInitialBalanceItem)
    {
        return $user->can('restore_accounting_initial_balance_item', $accountingInitialBalanceItem);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, AccountingInitialBalanceItem $accountingInitialBalanceItem)
    {
        return $user->can('force_delete_accounting_initial_balance_item', $accountingInitialBalanceItem);
    }
}
