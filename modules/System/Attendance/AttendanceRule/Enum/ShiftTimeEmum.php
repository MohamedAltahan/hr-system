<?php

namespace Modules\System\Attendance\AttendanceRule\Enum;

enum ShiftTimeEmum: string
{
    case MORNING = 'morning';
    case AFTERNOON = 'afternoon';
    case EVENING = 'evening';

    public function label(): string
    {
        return __("$this->value");
    }
}
