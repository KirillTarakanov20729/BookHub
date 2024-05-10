<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/books/home')->middleware('auth');

require __DIR__.'/auth.php';

require __DIR__ . '/admin/admin.php';

require __DIR__ . '/user/user.php';


