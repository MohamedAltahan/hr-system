<?php

use Illuminate\Support\Facades\Route;
use Modules\System\Setting\Http\Controllers\SettingController;

Route::prefix('v1')->group(function () {
    Route::apiResource('settings', SettingController::class)->names('settings');
});
