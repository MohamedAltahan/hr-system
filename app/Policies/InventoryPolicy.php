<?php

namespace App\Policies;

use App\Models\Inventory;
use Modules\Erp\User\Models\User;

class InventoryPolicy extends BasePolicy
{
    /**
     * Determine whether the user can view any models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_inventory');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Inventory $inventory)
    {
        return $user->can('view_inventory', $inventory);
    }

    /**
     * Determine whether the user can create models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_inventory');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Inventory $inventory)
    {
        return $user->can('update_inventory', $inventory);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Inventory $inventory)
    {
        return $user->can('delete_inventory', $inventory);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Inventory $inventory)
    {
        return $user->can('restore_inventory', $inventory);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Inventory $inventory)
    {
        return $user->can('force_delete_inventory', $inventory);
    }
}
