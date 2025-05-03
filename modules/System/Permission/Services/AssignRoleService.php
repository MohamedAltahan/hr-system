<?php

namespace Modules\System\Permission\Services;

use Modules\System\Permission\Models\Role;
use Modules\System\User\Models\User;

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
