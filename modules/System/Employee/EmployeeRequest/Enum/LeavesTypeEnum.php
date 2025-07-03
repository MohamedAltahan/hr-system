<?php

namespace Modules\System\Employee\EmployeeRequest\Enum;

enum LeavesTypeEnum: string
{
    case ANNUAl_LEAVE = 'annual_leave';
    case SICK_LEAVE = 'sick_leave';
    case MARRIAGE_LEAVE = 'marriage_leave';
    case EXAM_LEAVE = 'exam_leave';
    case UNPAID_LEAVE = 'unpaid_leave';

    public function label(): string
    {
        return __("$this->value");
    }
}
