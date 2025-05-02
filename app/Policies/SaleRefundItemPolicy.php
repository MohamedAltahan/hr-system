<?php

namespace App\Policies;

use App\Models\SaleRefundItem;
use Modules\Erp\User\Models\User;

class SaleRefundItemPolicy extends BasePolicy
{
    /**
     * Determine whether the user can view any models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_sale_refund_item');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, SaleRefundItem $saleRefundItem)
    {
        return $user->can('view_sale_refund_item');
    }

    /**
     * Determine whether the user can create models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_sale_refund_item');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, SaleRefundItem $saleRefundItem)
    {
        return $user->can('update_sale_refund_item');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, SaleRefundItem $saleRefundItem)
    {
        return $user->can('delete_sale_refund_item');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, SaleRefundItem $saleRefundItem)
    {
        return $user->can('restore_sale_refund_item');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, SaleRefundItem $saleRefundItem)
    {
        return $user->can('force_delete_sale_refund_item');
    }
}
