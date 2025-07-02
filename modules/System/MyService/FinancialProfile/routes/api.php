<?php

use Illuminate\Support\Facades\Route;
use Modules\System\MyService\FinancialProfile\Http\Controllers\MyFinancialProfileController;

Route::prefix('v1')->group(function () {
    Route::get('my-financial-profile', [MyFinancialProfileController::class, 'show'])->name('show');
});
