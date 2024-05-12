<?php

use Illuminate\Support\Facades\Route;


Route::prefix('features')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\Feature\FeatureController::class, 'index'])->name('admin.features.index');

    Route::get('/create', [\App\Http\Controllers\Admin\Feature\FeatureController::class, 'create'])->name('admin.features.create');

    Route::post('/', [\App\Http\Controllers\Admin\Feature\FeatureController::class, 'store'])->name('admin.features.store');

    Route::get('/{id}/edit', [\App\Http\Controllers\Admin\Feature\FeatureController::class, 'edit'])->name('admin.features.edit');

    Route::put('/{id}', [\App\Http\Controllers\Admin\Feature\FeatureController::class, 'update'])->name('admin.features.update');

    Route::delete('/{id}', [\App\Http\Controllers\Admin\Feature\FeatureController::class, 'delete'])->name('admin.features.delete');
});

