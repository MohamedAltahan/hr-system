<?php

use Illuminate\Support\Facades\Route;
use Modules\System\Salary\LeavesSalary\Http\Controllers\LeavesSalaryController;

Route::prefix('v1')->group(function () {
    Route::apiResource('overtime', LeavesSalaryController::class)->names('overtime');
});
