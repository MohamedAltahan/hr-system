<?php

use Illuminate\Support\Facades\Route;
use Modules\Erp\Sidebar\Http\Controllers\SidebarController;

Route::prefix('v1')->group(function () {
    Route::apiResource('sidebar', SidebarController::class)->names('sidebar');
});
