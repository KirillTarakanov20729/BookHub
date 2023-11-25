<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Http\Controllers\Users\Books\IndexController::class)->name('home');

Route::middleware('guest')->group(function() {
    Route::get('/login', \App\Http\Controllers\Users\Login\IndexController::class)->name("login");
    Route::post('/login/check', \App\Http\Controllers\Users\Login\StoreController::class)->name("check_login");

    Route::get('/register', \App\Http\Controllers\Users\Register\IndexController::class)->name("register");
    Route::post('/register/check', \App\Http\Controllers\Users\Register\StoreController::class)->name("check_register");

    Route::get('/logout', \App\Http\Controllers\Users\Logout\StoreController::class)->name('logout')->withoutMiddleware('guest');
});

Route::middleware('auth')->group(function() {
    Route::get('/account', \App\Http\Controllers\Users\Account\IndexController::class)->name("account");
});


Route::prefix('/books')->group(function() {
    Route::get('/{book}', \App\Http\Controllers\Users\Books\IndexController::class)->name('books.show');
});
