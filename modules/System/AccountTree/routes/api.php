<?php

use Illuminate\Support\Facades\Route;
use Modules\Erp\AccountTree\Http\Controllers\AccountTreeController;

Route::prefix('v1')->group(function () {
    Route::apiResource('account-tree', AccountTreeController::class)->names('account-tree');
});
