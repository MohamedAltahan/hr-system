<?php

use Illuminate\Support\Facades\Route;
use Modules\System\Attendance\AttendanceDeparture\Http\Controllers\AttendanceDepartureController;

Route::prefix('v1')->group(function () {
    Route::apiResource('attendance-departure', AttendanceDepartureController::class)->names('attendance-departure');
});
