<?php

namespace App\Policies;

use Modules\Erp\User\Models\User;

class AssignPermissionPolicy extends BasePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_assign_permission');
    }

    public function create(User $user): bool
    {
        return $user->can('create_assign_permission');
    }
}
