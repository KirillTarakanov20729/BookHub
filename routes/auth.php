<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

    Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

    Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'store_user'])->name('store_user');

    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login_check'])->name('login_check');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');

    Route::get('/profile', [\App\Http\Controllers\User\Profile\ProfileController::class, 'profile'])->name('profile');
});

