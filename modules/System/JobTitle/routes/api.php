<?php

use Illuminate\Support\Facades\Route;
use Modules\System\JobTitle\Http\Controllers\JobTitleController;

Route::prefix('v1')->group(function () {
    Route::apiResource('job-titles', JobTitleController::class)->names('job-titles');
});
