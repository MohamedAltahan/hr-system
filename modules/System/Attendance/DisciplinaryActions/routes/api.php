<?php

use Illuminate\Support\Facades\Route;
use Modules\System\Attendance\DisciplinaryActions\Http\Controllers\DisciplinaryActionsController;
use Modules\System\Attendance\DisciplinaryActions\Http\Controllers\DisciplinaryActionsListController;

Route::prefix('v1')->group(function () {
    Route::get('disciplinary-actions-list', DisciplinaryActionsListController::class);
    Route::apiResource('disciplinary-actions', DisciplinaryActionsController::class)->names('disciplinary-actions');
});
