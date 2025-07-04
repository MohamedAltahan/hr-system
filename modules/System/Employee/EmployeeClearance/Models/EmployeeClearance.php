<?php

namespace Modules\System\Employee\EmployeeClearance\Models;

use Modules\Common\Models\BaseModel;
use Modules\System\Attendance\AttendanceRule\Models\AttendanceRule;
use Modules\System\User\Models\User;

class EmployeeClearance extends BaseModel
{
    public $timestamps = false;

    // protected $fillable = [];
    protected $guarded = [];

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
