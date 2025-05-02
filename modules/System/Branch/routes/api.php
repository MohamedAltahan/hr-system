<?php

use Illuminate\Support\Facades\Route;
use Modules\Erp\Branch\Http\Controllers\BranchController;

Route::prefix('v1')->group(function () {
    Route::apiResource('branch', BranchController::class)->names('branch');
});
