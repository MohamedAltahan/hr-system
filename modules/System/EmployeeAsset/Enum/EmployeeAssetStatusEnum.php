<?php

namespace Modules\System\EmployeeAsset\Enum;

enum EmployeeAssetStatusEnum: string
{
    case PENDING = 'pending';
    case ISSUED = 'issued';
    case RETURNED = 'returned';
    case LOST = 'lost';

    public function label(): string
    {
        return __("$this->value");
    }
}
