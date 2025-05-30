<?php

namespace Modules\System\Subscription\Enum;

enum SubscriptionStatus: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case CANCELED = 'canceled';
    case EXPIRED = 'expired';
    case PENDING = 'pending';

    public function label(): string
    {
        return __("$this->value");
    }
}
