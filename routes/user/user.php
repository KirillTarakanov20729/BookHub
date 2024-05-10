<?php
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function() {
    require __DIR__ . '/book.php';

    require __DIR__ . '/subscription.php';
});
