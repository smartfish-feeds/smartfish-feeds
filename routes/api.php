<?php

use App\Http\Controllers\API\ScheduleController;
use App\Http\Controllers\API\SwitchController;
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
    Route::get('/', [SwitchController::class, 'index'])->name('switch.index');
    Route::get('/{id}', [SwitchController::class, 'show'])->name('switch.show');
    Route::put('/{id}', [SwitchController::class, 'update'])->name('switch.update');
});

/**
 * Schedule API Routes
 * prefix: api/schedule
 */
Route::prefix('schedule')->group(function () {
    Route::get('/', [ScheduleController::class, 'index'])->name('schedule.index');
    Route::get('/done', [ScheduleController::class, 'getDone'])->name('schedule.done');
    Route::get('/{id}', [ScheduleController::class, 'show'])->name('schedule.show');
    Route::put('/{id}', [ScheduleController::class, 'update'])->name('schedule.update');
});
