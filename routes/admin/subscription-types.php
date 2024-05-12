<?php

use Illuminate\Support\Facades\Route;


Route::prefix('subscription-types')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\SubscriptionType\SubscriptionTypeController::class, 'index'])->name('admin.subscription_types.index');

    Route::get('/create', [\App\Http\Controllers\Admin\SubscriptionType\SubscriptionTypeController::class, 'create'])->name('admin.subscription_types.create');

    Route::post('/', [\App\Http\Controllers\Admin\SubscriptionType\SubscriptionTypeController::class, 'store'])->name('admin.subscription_types.store');

    Route::get('/{id}/edit', [\App\Http\Controllers\Admin\SubscriptionType\SubscriptionTypeController::class, 'edit'])->name('admin.subscription_types.edit');

    Route::put('/{id}', [\App\Http\Controllers\Admin\SubscriptionType\SubscriptionTypeController::class, 'update'])->name('admin.subscription_types.update');

    Route::delete('/{id}', [\App\Http\Controllers\Admin\SubscriptionType\SubscriptionTypeController::class, 'delete'])->name('admin.subscription_types.delete');
});
