<?php

use Illuminate\Support\Facades\Route;
use Modules\System\EmployeeRequest\Http\Controllers\EmployeeRequestController;
use Modules\System\EmployeeRequest\Http\Controllers\EmployeeRequestTypeController;

Route::prefix('v1')->group(function () {
    Route::apiResource('employee-requests', EmployeeRequestController::class)->names('employee-requests');
    Route::get('employee-request-type-list', EmployeeRequestTypeController::class);
    Route::put('employee-request-update-status/{id}', [EmployeeRequestController::class, 'updateStatus']);
});
