<?php

use Illuminate\Support\Facades\Route;
use Modules\System\Salary\SalaryStructure\Http\Controllers\EmployeeSalaryController;
use Modules\System\Salary\SalaryStructure\Http\Controllers\SalaryComponentController;
use Modules\System\Salary\SalaryStructure\Http\Controllers\SalaryStructureController;
use Modules\System\Salary\SalaryStructure\Http\Controllers\StructureComponentController;

Route::prefix('v1')->group(function () {
    Route::apiResource('salary-structure', SalaryStructureController::class)->names('salary-structure');
    Route::apiResource('salary-component', SalaryComponentController::class)->names('salary-component');
    Route::apiResource('structure-component', StructureComponentController::class)->names('structure-component');
    Route::apiResource('employee-salary', EmployeeSalaryController::class)->names('employee-salary');
});
