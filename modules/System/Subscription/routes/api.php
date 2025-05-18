<?php

use Illuminate\Support\Facades\Route;
use Modules\System\Subscription\Http\Controllers\SubscriptionController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('subscriptions', SubscriptionController::class)->names('subscriptions');
});
