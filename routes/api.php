<?php
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LocationController;

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

Route::post("/admins/login", [AdminAuthController::class, "admin_login"])
    ->middleware('guest:api-admins');

Route::middleware('auth:api-admins')
    ->group(function () {
        Route::post('/admins/logout', [AdminAuthController::class, 'admin_logout']);
        Route::apiResource("admins", AdminController::class);
    });

Route::prefix('locations')
    ->group(function () {
        Route::get('/', [LocationController::class, 'index']);
        Route::get('/:location', [LocationController::class, 'show']);

        Route::middleware('auth:api-admins')->group(function () {
            Route::post('/', [LocationController::class, 'store']);
            Route::delete('/:location', [LocationController::class, 'destroy']);
            Route::put('/:location', [LocationController::class, 'update']);
        });
    });
