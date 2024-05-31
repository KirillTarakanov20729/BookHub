<?php

use Illuminate\Support\Facades\Route;

Route::get('/reset-password/email', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'email'])->name('reset-password.email');

Route::post('/reset-password/send_email', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'send_email'])->name('reset-password.send_email');

Route::get('/reset-password/{reset_password_request:token}', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'reset_view'])->name('reset-password.view');

Route::post('/reset-password/{reset_password_request:token}/change', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'reset_password'])->name('reset-password.reset');

