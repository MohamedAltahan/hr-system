<?php

namespace App\Policies;

use App\Models\PurchaseRefundItem;
use Modules\Erp\User\Models\User;

class PurchaseRefundItemPolicy extends BasePolicy
{
    /**
     * Determine whether the user can view any models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_purchase_refund_item');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, PurchaseRefundItem $purchaseRefundItem)
    {
        return $user->can('view_purchase_refund_item');
    }

    /**
     * Determine whether the user can create models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_purchase_refund_item');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, PurchaseRefundItem $purchaseRefundItem)
    {
        return $user->can('update_purchase_refund_item');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, PurchaseRefundItem $purchaseRefundItem)
    {
        return $user->can('delete_purchase_refund_item');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, PurchaseRefundItem $purchaseRefundItem)
    {
        return $user->can('restore_purchase_refund_item');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, PurchaseRefundItem $purchaseRefundItem)
    {
        return $user->can('force_delete_purchase_refund_item');
    }
}
