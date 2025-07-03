<?php

namespace Modules\System\Employee\EmployeeRequest\Models;

use Modules\Common\Models\BaseModel;
use Modules\System\Attendance\AttendanceRule\Models\AttendanceRule;
use Modules\System\Employee\EmployeeRequest\Enum\EmployeeRequestTypeEnum;
use Modules\System\Employee\EmployeeRequest\Enum\LeavesTypeEnum;
use Modules\System\User\Models\User;

class EmployeeRequest extends BaseModel
{
    public $timestamps = false;

    // protected $fillable = [];
    protected $guarded = [];

    protected $casts = [
        'type' => EmployeeRequestTypeEnum::class,
        'leave_type' => LeavesTypeEnum::class,
    ];

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function attendanceRule()
    {
        return $this->belongsTo(AttendanceRule::class, 'attendance_rule_id');
    }

    public function reviewedBy()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }
}
