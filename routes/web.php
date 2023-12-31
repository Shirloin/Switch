<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TransactionHeaderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('pages.home.home');
});
Route::get('/product-detail/{id}', [ProductController::class, 'detail']);

Route::middleware(['guest'])->group(function(){
    // Auth
    Route::POST('/logout', [AuthController::class, 'logout']);
    // Cart
    Route::GET('/cart', [CartController::class, 'index']);

    // Shop
    Route::GET('/shop', [ShopController::class, 'index']);
    // Transaction
    Route::GET('/transaction', [TransactionHeaderController::class, 'index']);
});



// Search
Route::GET('/search', [ProductController::class, 'index']);

