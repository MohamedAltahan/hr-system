<?php

use App\Support\ModuleRegistry;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(
        function () {
            foreach (ModuleRegistry::website() as $module) {
                $path = base_path("Modules/Website/{$module}/routes/api.php");
                if (file_exists($path)) {
                    Route::group([
                        'prefix' => 'website',
                        'as' => 'webiste.'.Str::of($module)->snake('-')->lower()->append('.')->toString(),
                    ], function () use ($path) {
                        require $path;
                    });
                }
            }
        }
    );
}
