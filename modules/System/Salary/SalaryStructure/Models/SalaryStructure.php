<?php

namespace Modules\System\Salary\SalaryStructure\Models;

use Modules\Common\Models\BaseModel;
use Modules\System\User\Models\User;

class SalaryStructure extends BaseModel
{
    // protected $fillable = [];
    protected $guarded = [];

    // relations
    public function salaryComponents()
    {
        return $this->belongsToMany(SalaryComponent::class, 'structure_components', 'salary_structure_id', 'salary_component_id')
            ->withPivot('value_type', 'value', 'base_component_id');
    }
}
