<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Plan\Http\Controllers\PlanController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('plans', PlanController::class)->names('plans');
});
