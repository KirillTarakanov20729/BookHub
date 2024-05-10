<?php

use Illuminate\Support\Facades\Route;

Route::prefix('books')->group(function() {

    Route::get('/home', [\App\Http\Controllers\User\Book\BookController::class, 'main'])->name('user.books.main');

    Route::get('/', [\App\Http\Controllers\User\Book\BookController::class, 'index'])->name('user.books.index');

    Route::get('/{book}', [\App\Http\Controllers\User\Book\BookController::class, 'show'])->name('user.books.show');

    Route::get('/{book}/read', [\App\Http\Controllers\User\Book\BookController::class, 'read'])->name('user.books.read');

    Route::post('/{book}/was_read', [\App\Http\Controllers\User\Book\BookController::class, 'was_read'])->name('user.books.was_read');
});


