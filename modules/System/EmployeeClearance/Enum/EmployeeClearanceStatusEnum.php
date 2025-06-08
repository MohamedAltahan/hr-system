<?php

namespace Modules\System\EmployeeClearance\Enum;

enum EmployeeClearanceStatusEnum: string
{
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';

    public function label(): string
    {
        return __("$this->value");
    }
}
