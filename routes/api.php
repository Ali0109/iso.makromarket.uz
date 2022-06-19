<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Android\AuthController;
use App\Http\Controllers\AppController;

// Public routes
// // Authorization
Route::post('/register_temp', [AuthController::class, 'registerTemp']);
Route::post('/register/{phone}', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// // Authorization
// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/check', [AuthController::class, 'check']);
    Route::post('/application', [AppController::class, 'get_data']);
});
