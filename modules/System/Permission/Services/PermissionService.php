<?php

namespace Modules\System\Permission\Services;

use Modules\System\Permission\Models\Permission;

class PermissionService
{
    public function getPermissions()
    {
        return Permission::all();
    }
}
