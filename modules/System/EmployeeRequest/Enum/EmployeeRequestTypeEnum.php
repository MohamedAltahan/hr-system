<?php

namespace Modules\System\EmployeeRequest\Enum;

enum EmployeeRequestTypeEnum: string
{
    case LOAN = 'loan';
    case LEAVE = 'leave';
    case LATE_ARRIVAL = 'late_arrival';
    case EARLY_DEPARTURE = 'early_departure';
    case OTHER = 'other';

    public function label(): string
    {
        return __("$this->value");
    }
}
