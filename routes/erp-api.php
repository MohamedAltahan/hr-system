<?php

use App\Support\ModuleRegistry;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomainOrSubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

foreach (ModuleRegistry::erp() as $module) {
    $path = base_path("Modules/Erp/{$module}/routes/api.php");
    if (file_exists($path)) {
        Route::group([
            'middleware' => [
                InitializeTenancyByDomainOrSubdomain::class,
                'auth:sanctum',
                // PreventAccessFromCentralDomains::class,
            ],
            'as' => Str::of($module)->snake('-')->lower()->append('.')->toString(),
        ], function () use ($path) {
            require $path;
        });
    }
}
