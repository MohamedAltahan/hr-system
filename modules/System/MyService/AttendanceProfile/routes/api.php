<?php

use Illuminate\Support\Facades\Route;
use Modules\System\MyService\AttendanceProfile\Http\Controllers\MyAttendanceProfileController;

Route::prefix('v1')->group(function () {
    Route::get('my-attendance-profile', [MyAttendanceProfileController::class, 'index']);
});
