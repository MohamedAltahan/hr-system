<?php

use Illuminate\Support\Facades\Route;
use Modules\System\Overtime\Http\Controllers\OvertimeController;

Route::prefix('v1')->group(function () {
    Route::apiResource('overtime', OvertimeController::class)->names('overtime');
});
