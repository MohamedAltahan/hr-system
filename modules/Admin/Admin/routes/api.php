<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Admin\Http\Controllers\AdminController;

Route::prefix('v1')->group(function () {
    Route::apiResource('admin', AdminController::class)->names('admin');
});
