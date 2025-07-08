<?php

namespace Modules\System\Salary\SalaryStructure\Services;

use Modules\System\Salary\SalaryStructure\Models\EmployeeSalary;
use Modules\System\User\Models\User;

class SalaryCalculator
{
    public static function calculate(User $employee)
    {
        $salary = $employee->currentSalary;
        $structure = $salary->salaryStructure;
        $basic = $salary->basic_salary;
        // dd($salary, $structure, $basic);
        $components = [];

        // dd($structure->salaryComponents);

        foreach ($structure->salaryComponents as $component) {
            if ($component->value_type === 'fixed') {
                $amount = $component->pivot->value;
            } else {
                $amount = $basic * ($component->pivot->value / 100);
            }

            $components[] = [
                'name' => $component->name,
                'type' => $component->type,
                'amount' => $amount,
            ];
        }

        $gross = $basic + collect($components)->where('type', 'allowance')->sum('amount');
        $deductions = collect($components)->where('type', 'deduction')->sum('amount');

        $net = $gross - $deductions;

        return [
            'basic' => $basic,
            'gross' => $gross,
            'net' => $net,
            'components' => $components,
        ];
    }
}
