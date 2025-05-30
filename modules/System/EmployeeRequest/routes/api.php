<?php

use Illuminate\Support\Facades\Route;
use Modules\System\EmployeeRequest\Http\Controllers\EmployeeRequestController;

Route::prefix('v1')->group(function () {
    Route::apiResource('employee-contracts', EmployeeRequestController::class)->names('employee-contracts');
});
