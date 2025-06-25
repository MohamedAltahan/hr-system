<?php

use Illuminate\Support\Facades\Route;
use Modules\System\Leaves\Leaves\Http\Controllers\LeavesController;

Route::prefix('v1')->group(function () {
    Route::apiResource('leaves', LeavesController::class)->names('leaves');
});
