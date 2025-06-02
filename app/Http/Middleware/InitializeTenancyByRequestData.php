<?php

namespace App\Http\Middleware;

use App\Exceptions\Custom\ExceptionResponse;
use App\Resolvers\SlugTenantResolver;
use Closure;
use Illuminate\Http\Request;
use Modules\Tenancy\States\Expired;
use Modules\Tenancy\States\UnderReview;
use Stancl\Tenancy\Contracts\TenantCouldNotBeIdentifiedException;
use Stancl\Tenancy\Tenancy;

class InitializeTenancyByRequestData extends \Stancl\Tenancy\Middleware\InitializeTenancyByRequestData
{
    public function __construct(
        Tenancy $tenancy,
        SlugTenantResolver $resolver
    ) {
        parent::__construct($tenancy, $resolver);
    }
    protected $except = [];

    public function handle($request, Closure $next)
    {
        if (!$request->expectsJson() && !$this->inExceptArray($request)) {
            abort(404);
        }

        if ($this->getPayload($request)) {
            return $this->initializeTenancy($request, $next, $this->getPayload($request));
        }

        return $next($request);
    }

    protected function getPayload(Request $request): ?string
    {
        $tenant = null;
        if (config('tenancy.config.header') && $request->hasHeader(config('tenancy.config.header'))) {
            $tenant = $request->header(config('tenancy.config.header'));
        } elseif (config('tenancy.config.query_parameter') && $request->has(config('tenancy.config.query_parameter'))) {
            $tenant = $request->get(config('tenancy.config.query_parameter'));
        }

        return $tenant;
    }

    protected function inExceptArray($request)
    {
        foreach ($this->except as $except) {
            if ($except !== '/') {
                $except = trim($except, '/');
            }

            if ($request->fullUrlIs($except) || $request->is($except)) {
                return true;
            }
        }

        return false;
    }

    public function initializeTenancy($request, $next, ...$resolverArguments)
    {
        try {
            $this->tenancy->initialize(
                $this->resolver->resolve(...$resolverArguments)
            );
        } catch (TenantCouldNotBeIdentifiedException $e) {
            $onFail = static::$onFail ?? function ($e) {
                throw $e;
            };

            return $onFail($e, $request, $next);
        }

        return $next($request);
    }
}
