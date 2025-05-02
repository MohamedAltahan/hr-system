<?php

namespace App\Policies;

use App\Models\PaymentMethod;
use Modules\Erp\User\Models\User;

class PaymentMethodPolicy extends BasePolicy
{
    /**
     * Determine whether the user can view any models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_payment_method');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, PaymentMethod $paymentMethod)
    {
        return $user->can('view_payment_method');
    }

    /**
     * Determine whether the user can create models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_payment_method');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, PaymentMethod $paymentMethod)
    {
        return $user->can('update_payment_method');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, PaymentMethod $paymentMethod)
    {
        return $user->can('delete_payment_method');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, PaymentMethod $paymentMethod)
    {
        return $user->can('restore_payment_method');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, PaymentMethod $paymentMethod)
    {
        return $user->can('force_delete_payment_method');
    }
}
