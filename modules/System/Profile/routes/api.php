<?php

use Illuminate\Support\Facades\Route;
use Modules\System\Profile\Http\Controllers\ProfileController;

Route::prefix('v1')->group(function () {
    Route::get('profile', [ProfileController::class, 'show'])->name('show');
    Route::put('update-profile', [ProfileController::class, 'updateProfile'])->name('update-profile');
});
