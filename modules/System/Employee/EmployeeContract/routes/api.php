<?php

use Illuminate\Support\Facades\Route;
use Modules\System\Employee\EmployeeContract\Http\Controllers\EmployeeContractController;

Route::prefix('v1')->group(function () {
    Route::apiResource('employee-contracts', EmployeeContractController::class)->names('employee-contracts');
});
