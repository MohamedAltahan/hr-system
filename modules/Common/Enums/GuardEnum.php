<?php

namespace Modules\Common\Enums;

enum GuardEnum: string
{
    case websiteSession = 'website_session';
    case website = 'website';

    case ADMINSESSION = 'admin_session';
    case admin = 'admin';

    case ERPSESSION = 'erp_session';
    case ERP = 'erp';

    public function middleware(): string
    {
        return 'auth:'.$this->value;
    }

    public function guestMiddleware(): string
    {
        return 'guest:'.$this->value;
    }

    public function label(): string
    {
        return __("enums.billing-period.{$this->value}");
    }

    public function authUser(): ?\Illuminate\Contracts\Auth\Authenticatable
    {
        return auth($this->value)->user();
    }

    public static function toArray(): array
    {
        $array = [];

        foreach (self::cases() as $definition) {
            $array[$definition->value] = $definition->value;
        }

        return $array;
    }
}
