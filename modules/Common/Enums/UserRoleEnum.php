<?php

namespace Modules\Common\Enums;

enum UserRoleEnum: string
{
    case SuperAdmin = 'super_admin';
    case Admin      = 'admin';
    case EMPLOYEE   = 'employee';
    case MANAGER    = 'manager';
    case OWNER      = 'owner';

    public function label(): string
    {
        return __("$this->value");
    }
}
