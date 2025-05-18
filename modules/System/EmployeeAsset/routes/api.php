<?php

use Illuminate\Support\Facades\Route;
use Modules\System\EmployeeAsset\Http\Controllers\EmployeeAssetController;

Route::prefix('v1')->group(function () {
    Route::apiResource('employee-assets', EmployeeAssetController::class)->names('employee-assets');
});
