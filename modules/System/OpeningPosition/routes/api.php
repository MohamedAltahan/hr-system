<?php

use Illuminate\Support\Facades\Route;
use Modules\System\OpeningPosition\Http\Controllers\OpeningPositionController;

Route::prefix('v1')->group(function () {
    Route::get('get-opening-positions-list', [OpeningPositionController::class, 'getOpeningPositions'])
        ->withoutMiddleware(['auth:sanctum'])->name('get-opening-positions-list');
    Route::apiResource('opening-positions', OpeningPositionController::class)->names('opening-positions');
});
