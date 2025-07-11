<?php

namespace Modules\System\Salary\SalaryStructure\Models;

use Modules\Common\Models\BaseModel;

class SalaryComponent extends BaseModel
{
    // protected $fillable = [];
    protected $guarded = [];

    // relations
    public function salaryStructure()
    {
        return $this->belongsToMany(SalaryStructure::class, 'structure_components', 'salary_component_id', 'salary_structure_id')
            ->withPivot('value_type', 'value', 'base_component_id');
    }
}
