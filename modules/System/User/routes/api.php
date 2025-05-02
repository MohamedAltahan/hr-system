<?php

use Illuminate\Support\Facades\Route;
use Modules\Erp\User\Http\Controllers\UserController;

Route::prefix('v1')->group(function () {
    Route::apiResource('user', UserController::class)->names('user');
});
