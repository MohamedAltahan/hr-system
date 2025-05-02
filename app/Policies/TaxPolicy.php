<?php

namespace App\Policies;

use Modules\Erp\User\Models\User;
use Modules\Tax\Models\Tax;

class TaxPolicy extends BasePolicy
{
    /**
     * Determine whether the user can view any models.
     *
     * @return bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_tax');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return bool
     */
    public function view(User $user, Tax $tax)
    {
        return $user->can('view_tax');
    }

    /**
     * Determine whether the user can create models.
     *
     * @return bool
     */
    public function create(User $user)
    {
        return $user->can('create_tax');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return bool
     */
    public function update(User $user, Tax $tax)
    {
        return $user->can('update_tax');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return bool
     */
    public function delete(User $user, Tax $tax)
    {
        return $user->can('delete_tax');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return bool
     */
    public function restore(User $user, Tax $tax)
    {
        return $user->can('restore_tax');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return bool
     */
    public function forceDelete(User $user, Tax $tax)
    {
        return $user->can('force_delete_tax');
    }
}
