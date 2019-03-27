<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');


Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.post');
Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register.post');;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('', [\App\Http\Controllers\Backend\HomeController::class, 'index'])->name('index');


    Route::prefix('occurrences')->name('occurrences.')->group(function () {
        Route::get('', [\App\Http\Controllers\Backend\OccurrencesController::class, 'index'])->name('index');
        Route::get('{occurrence}', [\App\Http\Controllers\Backend\OccurrencesController::class, 'single'])->name('single');
        Route::post('{occurrence}/comment', [\App\Http\Controllers\Backend\OccurrencesController::class, 'storeComment'])->name('storeComment');
    });

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('', [\App\Http\Controllers\Backend\UsersController::class, 'index'])->name('index');
    });
});