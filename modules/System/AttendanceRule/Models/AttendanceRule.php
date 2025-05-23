<?php

namespace Modules\System\AttendanceRule\Models;

use Modules\Common\Enums\UserRoleEnum;
use Modules\Common\Models\BaseModel;
use Modules\System\AttendanceRuleType\Models\AttendanceRuleType;
use Modules\System\Branch\Models\Branch;
use Modules\System\User\Models\User;

class AttendanceRule extends BaseModel
{
    protected $translatable = ['name'];

    protected $fillable = [
        'name',
        'branch_id',
        'entry_time',
        'exit_time',
        'break_time',
        'grace_period_minutes',
        'shift_time',
        'work_type',
        'weekly_days_count',
        'status',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    protected $casts = [
        // 'grace_period_minutes' => 'integer',
    ];
}
