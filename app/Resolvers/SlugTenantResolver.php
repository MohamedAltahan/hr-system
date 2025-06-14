<?php

namespace App\Resolvers;

use Modules\System\Tenant\Models\Tenant;
use Stancl\Tenancy\Resolvers\RequestDataTenantResolver;

class SlugTenantResolver extends RequestDataTenantResolver
{
    /**
     * Resolve a tenant using some value.
     *
     * @throws TenantCouldNotBeIdentifiedException
     */
    public function resolve(...$args): Tenant
    {
        $domain = $args[0];

        return Tenant::where('domain', $domain)->firstOrFail();
    }
}
