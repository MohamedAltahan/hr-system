<?php

use App\Http\Middleware\UpdateLastSeen;
use App\Support\ModuleRegistry;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomainOrSubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

foreach (ModuleRegistry::erp() as $module) {

    $path = base_path("modules/System/{$module}/routes/api.php");
    if (file_exists($path)) {
        Route::group([
            'middleware' => [
                'auth:sanctum',
                App\Http\Middleware\InitializeTenancyByRequestData::class,
                // InitializeTenancyByDomainOrSubdomain::class,
                // PreventAccessFromCentralDomains::class,
                UpdateLastSeen::class
            ],
            'as' => Str::of('system')->snake('-')->lower()->append('.')->toString(),
        ], function () use ($path) {
            require $path;
        });
    }
}
