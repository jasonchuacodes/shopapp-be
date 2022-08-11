<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductsController;
use GuzzleHttp\Handler\Proxy;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(ProductsController::class)->group(function () {
    Route::get('/products', 'index');
    Route::get('/products/test', 'fetchImage');
});

Route::controller(CustomerController::class)->group(function() {
    Route::get('/customers/{id}', 'index');
});

Route::controller(CartController::class)->group(function () {
    Route::get('/cart/{id}', 'index');
});

Route::get('/cart-item/{id}', [CartItemController::class, 'index']);
Route::post('/cart-item/new', [CartItemController::class, 'store']);
