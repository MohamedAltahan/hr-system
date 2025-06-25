<?php

use Illuminate\Support\Facades\Route;
use Modules\System\Salary\FlightTicket\Http\Controllers\FlightTicketController;

Route::prefix('v1')->group(function () {
    Route::apiResource('flight-tickets', FlightTicketController::class)->names('flight-tickets');
});
