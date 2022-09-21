<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/auth/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/auth/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group( function () {
    Route ::group(['prefix' => 'merchant', 'as' => 'merchant.', 'middleware' =>'role:merchant'], function () {
        Route::apiResource('stores', \App\Http\Controllers\Api\StoreController::class);
        Route::apiResource('products', \App\Http\Controllers\Api\ProductController::class);
    });
    Route ::group(['prefix' => 'user', 'as' => 'user.', 'middleware' =>'role:user'], function () {
        Route::apiResource('orders', \App\Http\Controllers\Api\OrderController::class);
    });
});
