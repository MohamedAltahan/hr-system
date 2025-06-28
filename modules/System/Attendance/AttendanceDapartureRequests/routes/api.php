<?php

use Illuminate\Support\Facades\Route;
use Modules\System\Attendance\AttendanceDepartureRequest\Http\Controllers\AttendanceDepartureRequestController;

Route::prefix('v1')->group(function () {
    Route::apiResource('attendance-departure', AttendanceDepartureRequestController::class)->names('attendance-departure');
});
