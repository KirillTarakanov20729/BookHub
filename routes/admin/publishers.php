<?php

use Illuminate\Support\Facades\Route;

Route::prefix('publishers')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\Publisher\PublisherController::class, 'index'])->name('admin.publishers.index');

    Route::get('/create', [\App\Http\Controllers\Admin\Publisher\PublisherController::class, 'create'])->name('admin.publishers.create');

    Route::post('/', [\App\Http\Controllers\Admin\Publisher\PublisherController::class, 'store'])->name('admin.publishers.store');

    Route::get('/{id}/edit', [\App\Http\Controllers\Admin\Publisher\PublisherController::class, 'edit'])->name('admin.publishers.edit');

    Route::put('/{id}', [\App\Http\Controllers\Admin\Publisher\PublisherController::class, 'update'])->name('admin.publishers.update');

    Route::delete('/{id}', [\App\Http\Controllers\Admin\Publisher\PublisherController::class, 'delete'])->name('admin.publishers.delete');
});
