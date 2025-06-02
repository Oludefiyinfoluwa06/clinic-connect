<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('app.pages.dashboard.index');
})->name('dashboard');

Route::prefix('auth')
    ->name('auth.')
    ->controller(AuthController::class)
    ->group(function () {
        Route::get('/login', 'showLoginPage')->name('login.page');
        Route::post('/login', 'login')->name('login');
    });
