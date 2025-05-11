<?php

namespace App\Support;

class ModuleRegistry
{
    public static function erp(): array
    {
        return [
            'Auth',
            'Branch',
            'AccountTree',
            'User',
            'Sidebar',
            'Permission',
            'Company',
            'Tenant',
            'Plan',
            'Department',
            'Position',
            'Employee',

        ];
    }

    public static function website(): array
    {
        return [
            'Auth',
            'User',
        ];
    }

    public static function admin(): array
    {
        return [
            'Auth',
            'TenantSidebar',
            'TenantPermission',
        ];
    }
}
