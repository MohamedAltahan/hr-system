<?php

use Illuminate\Support\Facades\Route;
use Modules\System\EmployeeRequest\Http\Controllers\EmployeeRequestController;
use Modules\System\EmployeeRequest\Http\Controllers\EmployeeRequestTypeController;
use Modules\System\EmployeeRequest\Http\Controllers\LeavesTypeController;

Route::prefix('v1')->group(function () {
    Route::apiResource('employee-requests', EmployeeRequestController::class)->names('employee-requests');
    Route::get('employee-request-type-list', EmployeeRequestTypeController::class);
    Route::get('leaves-type-list', LeavesTypeController::class);
    Route::put('employee-request-update-status/{id}', [EmployeeRequestController::class, 'updateStatus']);
});
