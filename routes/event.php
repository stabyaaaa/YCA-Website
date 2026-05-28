<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Event\EventRegistrationController;
use App\Http\Controllers\Event\EventDashboardController;
use App\Http\Controllers\Event\EventScannerController;
use App\Http\Controllers\Event\EventAttendeeController;
use App\Http\Controllers\Event\EventPrintController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (NO PRINTING HERE)
|--------------------------------------------------------------------------
*/

Route::prefix('event')->group(function () {

    Route::get('/register', [
        EventRegistrationController::class,
        'index'
    ]);

    Route::post('/register', [
        EventRegistrationController::class,
        'store'
    ]);

    // success page (optional)
    Route::get('/success/{id}', [
        EventRegistrationController::class,
        'success'
    ]);
});


/*
|--------------------------------------------------------------------------
| ADMIN PANEL (CONTROL CENTER)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin/event')->group(function () {

    Route::get('/dashboard', [
        EventDashboardController::class,
        'index'
    ]);

    Route::get('/attendees', [
        EventAttendeeController::class,
        'index'
    ]);

    Route::get('/scanner', [
        EventScannerController::class,
        'index'
    ]);

    /*
    |--------------------------------------------------------------------------
    | PRINT SYSTEM (ADMIN ONLY OR KIOSK)
    |--------------------------------------------------------------------------
    */

    Route::get('/print/{id}', [
        EventPrintController::class,
        'printBadge'
    ]);

    // optional: auto print trigger API
    Route::get('/print/next/queue', [
        EventPrintController::class,
        'nextQueue'
    ]);
});