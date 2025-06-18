<?php

use Illuminate\Support\Facades\Route;
use Modules\System\OpeningPosition\Http\Controllers\OpeningPositionController;

Route::prefix('v1')->group(function () {
    Route::apiResource('opening-position', OpeningPositionController::class)->names('opening-position');
});
