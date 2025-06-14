<?php

use Illuminate\Support\Facades\Route;
use Modules\System\Price\Http\Controllers\CurrencyController;
use Modules\System\Price\Http\Controllers\PriceController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('prices', PriceController::class)->names('prices');
    Route::post('assign-price-to-company', [PriceController::class, 'assignPriceToTenant'])->name('assign-price-to-company');
    Route::get('get-currencies', CurrencyController::class)->name('get-currencies');
});
