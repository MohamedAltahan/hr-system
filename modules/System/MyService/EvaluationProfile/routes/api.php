<?php

use Illuminate\Support\Facades\Route;
use Modules\System\MyService\EvaluationProfile\Http\Controllers\MyEvaluationProfileController;

Route::prefix('v1')->group(function () {
    Route::get('my-evaluation-profile', [MyEvaluationProfileController::class, 'index']);
});
