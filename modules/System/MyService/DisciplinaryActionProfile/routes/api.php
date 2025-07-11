<?php

use Illuminate\Support\Facades\Route;
use Modules\System\MyService\DisciplinaryActionProfile\Http\Controllers\MyDisciplinaryActionProfileController;

Route::prefix('v1')->group(function () {
    Route::get('my-disciplinary-action-profile', [MyDisciplinaryActionProfileController::class, 'index']);
});
