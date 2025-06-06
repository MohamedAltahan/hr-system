<?php

namespace Modules\System\EmployeeRequest\Models;

use Modules\Common\Models\BaseModel;
use Modules\System\AttendanceRule\Models\AttendanceRule;
use Modules\System\EmployeeRequest\Enum\EmployeeRequestTypeEnum;
use Modules\System\User\Models\User;

class EmployeeRequest extends BaseModel
{
    public $timestamps = false;

    // protected $fillable = [];
    protected $guarded = [];

    protected $casts = [
        'type' => EmployeeRequestTypeEnum::class,
    ];

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function attendanceRule()
    {
        return $this->belongsTo(AttendanceRule::class, 'attendance_rule_id');
    }

    public function reviwedBy()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }
}
