<?php

use Illuminate\Support\Facades\Route;
use Modules\System\Leaves\CarriedForwardLeaves\Http\Controllers\CarriedForwardLeavesController;

Route::prefix('v1')->group(function () {
    Route::apiResource('carried-forward-leaves', CarriedForwardLeavesController::class)->names('carried-forward-leaves');
});
