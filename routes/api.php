<?php

use App\Http\Controllers\Api\V1\AuthController;
use Grazulex\ApiRoute\Facades\ApiRoute;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| API routes are versioned using grazulex/laravel-apiroute.
| Supports URI path, header, query, and Accept header detection.
| See config/apiroute.php for configuration options.
|
*/

// Version 1 - Current stable version
ApiRoute::version('v1', function () {
    // Public routes
    Route::post('register', [AuthController::class, 'register'])->name('api.v1.register');
    Route::post('login', [AuthController::class, 'login'])->name('api.v1.login');

    // Protected routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('api.v1.logout');
        Route::get('me', [AuthController::class, 'me'])->name('api.v1.me');
    });
})->current();
