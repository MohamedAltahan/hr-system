<?php

namespace Modules\System\Employee\EmployeeRequest\Enum;

enum EmployeeRequestStatusEnum: string
{
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';

    public function label(): string
    {
        return __("$this->value");
    }
}
