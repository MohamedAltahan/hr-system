<?php

use Illuminate\Support\Facades\Route;
use Modules\System\Salary\FinancialTransaction\Http\Controllers\FinancialTransactionController;

Route::prefix('v1')->group(function () {
    Route::apiResource('financial-transactions', FinancialTransactionController::class)->names('financial-transactions');
});
