<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/acronym/{acronym}', [\App\Http\Controllers\AcronymsController::class, 'getAcronymDescription'])->name('api.acronym');

Route::prefix('occurrences')->group(function () {
    Route::get('getByID/{number}', [\App\Http\Controllers\Api\OccurrencesController::class, 'getOccurrenceByNumber'])->name('occurrences.number');
});
