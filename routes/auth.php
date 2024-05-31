<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

    Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

    Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'store_user'])->name('store_user');

    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login_check'])->name('login_check');

    require __DIR__.'/reset-password.php';
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');

    Route::get('/password/edit', [\App\Http\Controllers\Auth\PasswordController::class, 'edit'])->name('password.edit');

    Route::post('/password/update', [\App\Http\Controllers\Auth\PasswordController::class, 'update'])->name('password.update');

    Route::get('/profile', [\App\Http\Controllers\User\Profile\ProfileController::class, 'profile'])->name('profile');
});

