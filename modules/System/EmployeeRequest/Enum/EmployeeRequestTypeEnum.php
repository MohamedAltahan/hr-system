<?php

namespace Modules\System\EmployeeRequest\Enum;

enum EmployeeRequestTypeEnum: string
{
    case LOAN = 'loan';
    case LEAVE = 'leave';
    case OTHER = 'other';

    public function label(): string
    {
        return __("$this->value");
    }
}
