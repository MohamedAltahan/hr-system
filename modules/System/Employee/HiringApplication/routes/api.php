<?php

use Illuminate\Support\Facades\Route;
use Modules\System\Employee\HiringApplication\Http\Controllers\HiringApplicationController;

Route::prefix('v1')->group(function () {
    Route::post('hiring-applications', [HiringApplicationController::class, 'store'])->withoutMiddleware(['auth:sanctum'])->name('hiring-applications.store');
    Route::apiResource('hiring-applications', HiringApplicationController::class)->except(['store'])->names('hiring-applications');
    Route::post('hiring-applications/change-status', [HiringApplicationController::class, 'changeStatus'])->name('hiring-applications-change-status');
});
