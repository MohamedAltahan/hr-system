<?php

use Illuminate\Support\Facades\Route;
use Modules\System\Position\Http\Controllers\PositionController;

Route::prefix('v1')->group(function () {
    Route::apiResource('position', PositionController::class)->names('position');
});
