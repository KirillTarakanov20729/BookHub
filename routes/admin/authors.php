<?php

use Illuminate\Support\Facades\Route;


Route::prefix('authors')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\Author\AuthorController::class, 'index'])->name('admin.authors.index');

    Route::get('/create', [\App\Http\Controllers\Admin\Author\AuthorController::class, 'create'])->name('admin.authors.create');

    Route::post('/', [\App\Http\Controllers\Admin\Author\AuthorController::class, 'store'])->name('admin.authors.store');

    Route::get('/{id}/edit', [\App\Http\Controllers\Admin\Author\AuthorController::class, 'edit'])->name('admin.authors.edit');

    Route::put('/{id}', [\App\Http\Controllers\Admin\Author\AuthorController::class, 'update'])->name('admin.authors.update');

    Route::delete('/{id}', [\App\Http\Controllers\Admin\Author\AuthorController::class, 'delete'])->name('admin.authors.delete');
});

