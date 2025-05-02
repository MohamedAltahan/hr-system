<?php

namespace App\Policies;

use Modules\Erp\User\Models\User;

class AssignRolePolicy extends BasePolicy
{
    public function viewAny(User $user)
    {
        return $user->can('view_any_assign_role');
    }

    public function create(User $user): bool
    {
        return $user->can('create_assign_role');
    }
}
