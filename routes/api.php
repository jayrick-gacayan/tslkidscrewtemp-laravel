<?php
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;

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

Route::prefix("admins")->group(function () {
    Route::post("login", [AdminAuthController::class, "admin_login"])->middleware('guest:api-admins');

    Route::middleware('auth:api-admins')->group(function () {
        Route::post('logout', [AdminAuthController::class, 'admin_logout']);
        Route::apiResource("admin-users", AdminController::class);
    });
});

