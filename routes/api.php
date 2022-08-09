<?php

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