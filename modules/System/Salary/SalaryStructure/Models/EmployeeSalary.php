<?php

namespace Modules\System\Salary\SalaryStructure\Models;

use Modules\Common\Models\BaseModel;
use Modules\System\User\Models\User;

class EmployeeSalary extends BaseModel
{
    // protected $fillable = [];
    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }

    public function salaryStructure()
    {
        return $this->belongsTo(SalaryStructure::class, 'salary_structure_id', 'id');
    }
}
