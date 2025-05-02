<?php

namespace App\Policies;

use App\Models\ProductUnit;
use Modules\Erp\User\Models\User;

class ProductUnitPolicy extends BasePolicy
{
    /**
     * Determine whether the user can view any models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_product_unit');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ProductUnit $productUnit)
    {
        return $user->can('view_product_unit', $productUnit);
    }

    /**
     * Determine whether the user can create models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_product_unit');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ProductUnit $productUnit)
    {
        return $user->can('update_product_unit', $productUnit);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ProductUnit $productUnit)
    {
        return $user->can('delete_product_unit', $productUnit);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, ProductUnit $productUnit)
    {
        return $user->can('restore_product_unit', $productUnit);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, ProductUnit $productUnit)
    {
        return $user->can('force_delete_product_unit', $productUnit);
    }
}
