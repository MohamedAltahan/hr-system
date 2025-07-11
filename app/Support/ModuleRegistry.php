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
            'Employee/Position',
            'Employee/JobTitle',
            'Employee/EmployeeEvaluation',
            'Employee/EmployeeAssetType',
            'Employee/EmployeeAsset',
            'Employee/EmployeeContract',
            'Employee/EmployeeRequest',
            'Employee/EmployeeClearance',
            'Attendance/AttendanceRule',
            'Attendance/AttendanceDeparture',
            'Attendance/DisciplinaryActions',
            'Attendance/AttendanceDepartureRequest',
            'Subscription',
            'Profile',
            'Price',
            'Setting',
            'Employee/OpeningPosition',
            'Employee/HiringApplication',
            'Salary/Overtime',
            'Salary/FinancialTransaction',
            'Salary/FlightTicket',
            'Salary/SalaryStructure',
            'Salary/Payslip',
            'Leaves/Leaves',
            'Leaves/CarriedForwardLeaves',
            'MyService/Profile',
            'MyService/FinancialProfile',
            'MyService/AttendanceProfile',
            'MyService/DisciplinaryActionProfile',
            'MyService/EvaluationProfile',
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
