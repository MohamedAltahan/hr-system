<?php

use Illuminate\Support\Facades\Route;
use Modules\System\User\Http\Controllers\UserController;

Route::prefix('v1')->group(function () {
    Route::apiResource('employee', UserController::class)->names('employee');
});
