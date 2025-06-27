<?php

use Illuminate\Support\Facades\Route;
use Modules\System\Attendance\AttendanceRule\Http\Controllers\AttendanceRuleController;

Route::prefix('v1')->group(function () {
    Route::apiResource('attendance-rules', AttendanceRuleController::class)->names('attendance-rules');
});
