<?php

use Illuminate\Support\Facades\Route;


Route::prefix('users')->group(function() {

    Route::get('/', [\App\Http\Controllers\Admin\User\UserController::class, 'index'])->name('admin.users.index');
});


