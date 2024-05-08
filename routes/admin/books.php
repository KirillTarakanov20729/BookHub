<?php

use Illuminate\Support\Facades\Route;


Route::prefix('books')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\Book\BookController::class, 'index'])->name('admin.books.index');

    Route::get('/create', [\App\Http\Controllers\Admin\Book\BookController::class, 'create'])->name('admin.books.create');

    Route::post('/', [\App\Http\Controllers\Admin\Book\BookController::class, 'store'])->name('admin.books.store');

    Route::get('/{id}/edit', [\App\Http\Controllers\Admin\Book\BookController::class, 'edit'])->name('admin.books.edit');

    Route::put('/{id}', [\App\Http\Controllers\Admin\Book\BookController::class, 'update'])->name('admin.books.update');

    Route::delete('/{id}', [\App\Http\Controllers\Admin\Book\BookController::class, 'delete'])->name('admin.books.delete');
});
