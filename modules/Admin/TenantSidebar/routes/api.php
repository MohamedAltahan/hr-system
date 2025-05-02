<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\TenantSidebar\Http\Controllers\TenantSidebarController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('tenant-sidebar', TenantSidebarController::class)->names('tenant-sidebar');
});
