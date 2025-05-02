<?php

use Illuminate\Support\Facades\Route;
use Modules\Erp\Auth\Http\Controllers\AuthController;

Route::controller(AuthController::class)->prefix('v1')->group(function () {
    Route::post('login', 'login')->name('login')->withoutMiddleware(['auth:sanctum']);
    Route::post('logout', 'logout')->name('logout');
});
