<?php

namespace Modules\System\Employee\EmployeeRequest\Enum;

enum EmployeeRequestTypeEnum: string
{
    case ATTENDANCE_CORRECTION = 'attendance_correction';
    case ADVANCE = 'advance';
    case LEAVE = 'leave';
    case LATE_ARRIVAL = 'late_arrival';
    case EARLY_DEPARTURE = 'early_departure';
    case OVER_TIME = 'over_time';
    case RESIGNATION = 'resignation';
    case ASSET = 'asset';
    case ASSET_CLEARANCE = 'asset_clearance';
    case LETTERS = 'letters';

    public function label(): string
    {
        return __("$this->value");
    }
}
