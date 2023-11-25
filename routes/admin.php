<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->middleware(['admin'])->group(function() {
    Route::get('/index', \App\Http\Controllers\Admin\MainPage\IndexController::class)->name('admin.index');



    Route::prefix('/books')->group(function() {
       Route::get('/index', \App\Http\Controllers\Admin\Book\IndexController::class)->name('admin.books.index');

       Route::get('/create', \App\Http\Controllers\Admin\Book\CreateController::class)->name('admin.books.create');
       Route::post('', \App\Http\Controllers\Admin\Book\StoreController::class)->name('admin.books.store');
    });



    Route::prefix('/authors')->group(function() {
       Route::get('/index', \App\Http\Controllers\Admin\Author\IndexController::class)->name('admin.authors.index');

       Route::get('/create', \App\Http\Controllers\Admin\Author\CreateController::class)->name('admin.authors.create');
       Route::post('', \App\Http\Controllers\Admin\Author\StoreController::class)->name('admin.authors.store');

       Route::get('/{author}/edit', \App\Http\Controllers\Admin\Author\EditController::class)->name('admin.authors.edit');
       Route::put('/{author}', \App\Http\Controllers\Admin\Author\UpdateController::class)->name('admin.authors.update');

       Route::delete('/{author}', \App\Http\Controllers\Admin\Author\DeleteController::class)->name('admin.authors.delete');
    });



    Route::prefix('/genres')->group(function() {
        Route::get('/index', \App\Http\Controllers\Admin\Genre\IndexController::class)->name('admin.genres.index');

        Route::get('/create', \App\Http\Controllers\Admin\Genre\CreateController::class)->name('admin.genres.create');
        Route::post('', \App\Http\Controllers\Admin\Genre\StoreController::class)->name('admin.genres.store');

        Route::get('/{genre}/edit', \App\Http\Controllers\Admin\Genre\EditController::class)->name('admin.genres.edit');
        Route::put('/{genre}', \App\Http\Controllers\Admin\Genre\UpdateController::class)->name('admin.genres.update');

        Route::delete('/{genre}', \App\Http\Controllers\Admin\Genre\DeleteController::class)->name('admin.genres.delete');
    });


    Route::prefix('/users')->group(function() {
       Route::get('/index', \App\Http\Controllers\Admin\User\IndexController::class)->name('admin.users.index');

       Route::get('/{user}/block', \App\Http\Controllers\Admin\User\BlockController::class)->name('admin.users.block');
       Route::get('/{user}/unblock', \App\Http\Controllers\Admin\User\UnblockController::class)->name('admin.users.unblock');
    });
});

