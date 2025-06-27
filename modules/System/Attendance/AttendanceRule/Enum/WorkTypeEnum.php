<?php

namespace Modules\System\Attendance\AttendanceRule\Enum;

enum WorkTypeEnum: string
{
    case FULLTIME = 'full-time';
    case PARTTIME = 'part-time';
    case FLEXIBLE = 'flexible';

    public function label(): string
    {
        return __("$this->value");
    }
}
