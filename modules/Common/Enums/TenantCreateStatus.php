<?php

namespace Modules\Common\Enums;

enum TenantCreateStatus: int
{
    case FAILED = 0;
    case CREATED = 1;
    case PENDING = 2;

    public function label(): string
    {
        return __("$this->name");
    }
}
