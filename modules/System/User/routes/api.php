<?php

use Illuminate\Support\Facades\Route;
use Modules\System\User\Http\Controllers\UserController;

Route::prefix('v1')->group(function () {
    Route::apiResource('users', UserController::class)->names('users');
});
