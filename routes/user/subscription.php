<?php

use Illuminate\Support\Facades\Route;

Route::prefix('subscriptions')->middleware('auth')->group(function() {
    Route::get('index', [\App\Http\Controllers\User\Subscription\SubscriptionController::class, 'index'])->name('user.subscriptions.index');

    Route::get('{subscription_type_id}/change', [\App\Http\Controllers\User\Subscription\SubscriptionController::class, 'change_subscription'])->name('user.subscriptions.change_subscription');
});
