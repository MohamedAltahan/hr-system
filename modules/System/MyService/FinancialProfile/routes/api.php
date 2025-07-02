<?php

use Illuminate\Support\Facades\Route;
use Modules\System\MyService\Profile\Http\Controllers\MyProfileController;

Route::prefix('v1')->group(function () {
    Route::get('my-profile', [MyProfileController::class, 'show'])->name('show');
});
