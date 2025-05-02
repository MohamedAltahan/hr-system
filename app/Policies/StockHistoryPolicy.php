<?php

namespace App\Policies;

use App\Models\StockHistory;
use Modules\Erp\User\Models\User;

class StockHistoryPolicy extends BasePolicy
{
    /**
     * Determine whether the user can view any models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_stock_history');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, StockHistory $stockHistory)
    {
        return $user->can('view_stock_history');
    }

    /**
     * Determine whether the user can create models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_stock_history');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, StockHistory $stockHistory)
    {
        return $user->can('update_stock_history');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, StockHistory $stockHistory)
    {
        return $user->can('delete_stock_history');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, StockHistory $stockHistory)
    {
        return $user->can('restore_stock_history');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, StockHistory $stockHistory)
    {
        return $user->can('force_delete_stock_history');
    }
}
