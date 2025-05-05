<?php

use Illuminate\Support\Facades\Route;
use Modules\System\Tenant\Http\Controllers\TenantController;

Route::prefix('v1')->middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('company', TenantController::class)->names('company');
});
