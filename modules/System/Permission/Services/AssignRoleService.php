<?php

namespace Modules\Erp\Permission\Services;

use Modules\Erp\Permission\Models\Role;
use Modules\Erp\User\Models\User;

class AssignRoleService
{
    public function assignRole($request)
    {
        $user = User::find($request->user_id);
        $roles = $request->validated('role_ids');

        $roles = Role::whereIn('id', $roles)->get();
    }

    public function getUserRoles($id)
    {
        $user = User::findOrFail($id);
        return $user->roles;
    }
}
