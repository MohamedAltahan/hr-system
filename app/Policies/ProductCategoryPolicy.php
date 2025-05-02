<?php

namespace App\Policies;

use App\Models\ProductCategory;
use Modules\Erp\User\Models\User;

class ProductCategoryPolicy extends BasePolicy
{
    /**
     * Determine whether the user can view any models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_product_category');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ProductCategory $productCategory)
    {
        return $user->can('view_product_category', $productCategory);
    }

    /**
     * Determine whether the user can create models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_product_category');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ProductCategory $productCategory)
    {
        return $user->can('update_product_category', $productCategory);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ProductCategory $productCategory)
    {
        return $user->can('delete_product_category', $productCategory);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, ProductCategory $productCategory)
    {
        return $user->can('restore_product_category', $productCategory);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, ProductCategory $productCategory)
    {
        return $user->can('force_delete_product_category', $productCategory);
    }
}
