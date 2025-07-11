<?php

use Illuminate\Support\Facades\Route;
use Modules\System\Employee\EmployeeClearance\Http\Controllers\EmployeeClearanceController;

Route::prefix('v1')->group(function () {
    Route::apiResource('employee-clearances', EmployeeClearanceController::class)->names('employee-clearances');
    Route::put('employee-clearance-update-status/{id}', [EmployeeClearanceController::class, 'updateStatus']);
});
