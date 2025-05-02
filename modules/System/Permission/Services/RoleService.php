<?php

namespace Modules\Erp\Permission\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Modules\Erp\Permission\Models\Role;

class RoleService
{
    public function getRoles()
    {
        return Role::all();
    }

    public function storeRoleWithPermissions($request): void
    {
        $validated = $request->validated();
        $permissionIds = Arr::pull($validated, 'permission_Ids');
        $permissionIds = array_map('intval', $permissionIds);

        $role = Role::create($validated);
        $role->syncPermissions($permissionIds);
    }

    public function updateRoleWithPermissions($request, $id): void
    {
        $role = Role::find($id);
        $validated = $request->validated();

        $permissionIds = Arr::pull($validated, 'permission_Ids');
        $permissionIds = array_map('intval', $permissionIds);

        $role->update($validated);
        $role->syncPermissions($permissionIds);
    }

    public function destroy($id)
    {
        $roleExistance = DB::table('model_has_roles')->where('role_id', $id)->exists();

        if ($roleExistance) {
            return false;
        }

        $role = Role::find($id);

        return $role->delete();
    }
}
