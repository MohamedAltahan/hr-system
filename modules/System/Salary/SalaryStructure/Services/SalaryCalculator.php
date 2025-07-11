<?php

namespace Modules\System\Salary\SalaryStructure\Services;

use Modules\System\Salary\SalaryStructure\Models\EmployeeSalary;
use Modules\System\User\Models\User;

class SalaryCalculator
{
    protected $salary;
    protected $structure;
    protected $basic;

    public function __construct(User $employee)
    {
        $this->salary = $employee->currentSalary;
        $this->structure = $this->salary->salaryStructure;
        $this->basic = $this->salary->basic_salary;
    }

    public  function calculate()
    {
        $components = [];

        foreach ($this->structure->salaryComponents as $component) {

            if ($component->pivot->value_type == 'fixed') {

                $amount = $component->pivot->value;
            } else if ($component->pivot->value_type == 'percentage') {

                $amount = $this->basic * ($component->pivot->value / 100);
            } else if ($component->pivot->value_type == 'system') {

                if ($component->slug == 'absence_deductions') {

                    $amount = $this->calculateAbsence();
                } else if ($component->slug == 'late_deductions') {

                    $amount = $this->calculateLate();
                } else if ($component->slug == 'punishments_deductions') {

                    $amount = $this->calculatePunishments();
                }
            }

            // if (!$component->is_basic_salary) {
            $components[] = [
                'name' => $component->name,
                'type' => $component->type,
                'amount' => $amount,
            ];
            // }
        }

        $gross = $this->basic + collect($components)->where('type', 'allowance')->sum('amount');
        $deductions = collect($components)->where('type', 'deduction')->sum('amount');

        $net = $gross - $deductions;

        return [
            'basic' =>  $this->basic,
            // 'gross' => $gross,
            'net_salary' => $net,
            'deductions' => $deductions,
            'components' => $components,
        ];
    }

    public  function calculateAbsence()
    {
        return 0;
    }
    public  function calculateLate()
    {
        return 0;
    }
    public  function calculatePunishments()
    {
        return 0;
    }
}
