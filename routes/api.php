<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/author', \App\Http\Controllers\Api\CreateAuthorController::class);

Route::get('/test', \App\Http\Controllers\Api\TestController::class);

Route::get('/author/{author}', \App\Http\Controllers\Api\GetAuthorController::class);

Route::get('/author', \App\Http\Controllers\Api\GetAuthorsController::class);

Route::delete('/author/{author}', \App\Http\Controllers\Api\DeleteAuthorController::class);

Route::put('/author/{author}', \App\Http\Controllers\Api\UpdateAuthorController::class);


