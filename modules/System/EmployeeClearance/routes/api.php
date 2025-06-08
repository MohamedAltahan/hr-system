<?php

use Illuminate\Support\Facades\Route;
use Modules\System\EmployeeClearance\Http\Controllers\EmployeeClearanceController;
use Modules\System\EmployeeClearance\Http\Controllers\EmployeeClearanceTypeController;

Route::prefix('v1')->group(function () {
    Route::apiResource('employee-clearances', EmployeeClearanceController::class)->names('employee-clearances');
    Route::put('employee-clearance-update-status/{id}', [EmployeeClearanceController::class, 'updateStatus']);
});
