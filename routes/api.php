<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',[LoginController::class,'login']);

Route::middleware('auth:sanctum')->group( function(){

    Route::post('/logout',[LoginController::class,'logout']);

    // Users
    Route::apiResource('users',UserController::class)->middleware('admin','mod');

    // Categories
    Route::apiResource('categories',CategoryController::class)->middleware('admin','mod');

    // Payment Methods
    Route::apiResource('payment-methods',PaymentMethodController::class)->middleware('admin','mod');

    // Currency
    Route::apiResource('currency',CurrencyController::class)->middleware('admin','mod');

    // Clients
    Route::apiResource('clients',ClientController::class);

    // Providers
    Route::apiResource('providers',ProviderController::class)->middleware('admin','mod');

    // Products
    Route::apiResource('products',ProductController::class);
});
