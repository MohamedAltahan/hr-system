<?php

use Illuminate\Support\Facades\Route;
use Modules\Erp\Permission\Http\Controllers\AssignRoleController;
use Modules\Erp\Permission\Http\Controllers\PermissionController;
use Modules\Erp\Permission\Http\Controllers\RoleController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('permission', PermissionController::class)->names('permission');
    Route::apiResource('role', RoleController::class)->names('role');
    Route::apiResource('assign-role', AssignRoleController::class)->names('assign-role');
});
