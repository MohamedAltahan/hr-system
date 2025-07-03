<?php

namespace Modules\System\Employee\EmployeeAsset\Models;

use Modules\Common\Models\BaseModel;
use Modules\System\Department\Models\Department;
use Modules\System\Employee\EmployeeAssetType\Models\EmployeeAssetType;
use Modules\System\User\Models\User;

class EmployeeAsset extends BaseModel
{
    public $timestamps = false;

    protected $fillable = ['manager_id', 'employee_id', 'employee_asset_type_id', 'department_id', 'issue_date', 'return_date', 'status'];

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function asset()
    {
        return $this->belongsTo(EmployeeAssetType::class, 'employee_asset_type_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
