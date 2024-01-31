<?php

use App\Http\Controllers\API\ApiScheduleController;
use App\Http\Controllers\API\ApiSwitchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/**
 * Switch API Routes
 * prefix: api/switch
 */
Route::prefix('switch')->group(function () {
    Route::get('/', [ApiSwitchController::class, 'index'])->name('switch.index');
    Route::get('/{id}', [ApiSwitchController::class, 'show'])->name('switch.show');
    Route::put('/{id}', [ApiSwitchController::class, 'update'])->name('switch.update');
});

/**
 * Schedule API Routes
 * prefix: api/schedule
 */
Route::prefix('schedule')->group(function () {
    Route::get('/', [ApiScheduleController::class, 'index'])->name('schedule.index');
    Route::get('/done', [ApiScheduleController::class, 'getDone'])->name('schedule.done');
    Route::get('/{id}', [ApiScheduleController::class, 'show'])->name('schedule.show');
    Route::put('/{id}', [ApiScheduleController::class, 'update'])->name('schedule.update');
});
