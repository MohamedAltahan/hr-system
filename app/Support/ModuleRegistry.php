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
            'Tenant',
            'TenantSidebar',
            'TenantPermission',
            'Plan',

        ];
    }
}
