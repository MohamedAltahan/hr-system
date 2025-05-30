<?php

use Illuminate\Support\Facades\Route;
use Modules\System\Plan\Http\Controllers\PlanController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('plans', PlanController::class)->names('plans');
    Route::get('get-active-plans', [PlanController::class, 'getActivePlans'])->name('get-active-plans');
    Route::post('assign-plan-to-tenant', [PlanController::class, 'assignPlanToTenant'])->name('assign-plan-to-tenant');
});
