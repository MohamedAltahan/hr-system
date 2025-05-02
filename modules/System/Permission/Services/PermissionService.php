<?php

namespace Modules\Erp\Permission\Services;

use Modules\Erp\Permission\Models\Permission;

class PermissionService
{
    public function getPermissions()
    {
        return Permission::all();
    }
}
