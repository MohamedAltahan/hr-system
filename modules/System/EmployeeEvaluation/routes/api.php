<?php

use Illuminate\Support\Facades\Route;
use Modules\System\EmployeeEvaluation\Http\Controllers\EmployeeEvaluationController;

Route::prefix('v1')->group(function () {
    Route::apiResource('employee-evaluation', EmployeeEvaluationController::class)->names('employee-evaluation');
});
