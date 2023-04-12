<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Here is where you can register auth routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/auth')->group(function() {
    Route::prefix('/login')->group(function() {
        Route::get('/', [LoginController::class, 'index'])
            ->middleware(['guest'])
            ->name('auth.login');

        Route::post('/', [LoginController::class, 'authenticate'])
            ->middleware(['guest'])
            ->name('auth.authenticate');
    });
    Route::middleware(['auth'])->group(function () {
        Route::get('/logout', [LogoutController::class, 'logout'])->name('auth.logout');
    });
});
