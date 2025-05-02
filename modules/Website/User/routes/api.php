<?php

use Illuminate\Support\Facades\Route;
use Modules\Website\User\Http\Controllers\UserController;

Route::prefix('v1')->middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('user', UserController::class)->except(['store'])->names('user');
});

Route::prefix('v1')->group(function () {
    Route::post('user', [UserController::class, 'store'])->name('user.store');
});
