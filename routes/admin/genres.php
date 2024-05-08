<?php

use Illuminate\Support\Facades\Route;


Route::prefix('genres')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\Genre\GenreController::class, 'index'])->name('admin.genres.index');

    Route::get('/create', [\App\Http\Controllers\Admin\Genre\GenreController::class, 'create'])->name('admin.genres.create');

    Route::post('/', [\App\Http\Controllers\Admin\Genre\GenreController::class, 'store'])->name('admin.genres.store');

    Route::get('/{id}/edit', [\App\Http\Controllers\Admin\Genre\GenreController::class, 'edit'])->name('admin.genres.edit');

    Route::put('/{id}', [\App\Http\Controllers\Admin\Genre\GenreController::class, 'update'])->name('admin.genres.update');

    Route::delete('/{id}', [\App\Http\Controllers\Admin\Genre\GenreController::class, 'delete'])->name('admin.genres.delete');
});
