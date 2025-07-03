<?php

use Illuminate\Support\Facades\Route;
use Modules\System\Employee\EmployeeAssetType\Http\Controllers\EmployeeAssetTypeController;

Route::prefix('v1')->group(function () {
    Route::apiResource('employee-asset-types', EmployeeAssetTypeController::class)->names('employee-asset-types');
});
