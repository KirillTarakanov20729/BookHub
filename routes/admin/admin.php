<?php

use Illuminate\Support\Facades\Route;


Route::middleware('is_admin')->prefix('admin')->group(function() {
    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');

    require __DIR__ . '/genres.php';

    require __DIR__ . '/authors.php';

    require __DIR__ . '/users.php';

    require __DIR__ . '/publishers.php';

    require __DIR__ . '/books.php';

    require __DIR__ . '/features.php';

    require __DIR__ . '/subscription-types.php';

});


