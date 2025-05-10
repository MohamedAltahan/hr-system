<?php

use Illuminate\Support\Facades\Route;
use Modules\System\Department\Http\Controllers\DepartmentController;

Route::prefix('v1')->group(function () {
    Route::apiResource('department', DepartmentController::class)->names('department');
});
