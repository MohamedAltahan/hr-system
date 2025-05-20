<?php

namespace Modules\System\AttendanceRule\Models;

use Modules\Common\Enums\UserRoleEnum;
use Modules\Common\Models\BaseModel;
use Modules\System\AttendanceRuleType\Models\AttendanceRuleType;
use Modules\System\User\Models\User;

class AttendanceRule extends BaseModel
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


    public function department()
    {
        return $this->belongsTo(User::class, 'department_id');
    }
}
