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
            'JobTitle',
            'EmployeeEvaluation',
            'EmployeeAssetType',
            'EmployeeAsset',
            'EmployeeContract',
            'EmployeeRequest',
            'EmployeeClearance',
            'AttendanceRule',
            'Subscription',
            'Profile',
            'Price',
            "Setting",
            'OpeningPosition',
            'HiringApplication',
            'Salary/Overtime',
            'Salary/FinancialTransaction',
            'Salary/FlightTicket',
            'Leaves/Leaves',
            'Leaves/CarriedForwardLeaves',
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
