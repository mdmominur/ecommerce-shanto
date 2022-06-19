<?php

use App\Http\Controllers\cartController;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CheckoutController;
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


    Route::get('/', [frontendController::class, 'frontend']);
    Route::get('/cart', [cartController::class, 'cart']);
    Route::get('/add-cart/{id}', [cartController::class, 'addToCart']);
    Route::get('/cart-remove/{id}', [cartController::class, 'cartRemove']);

    Auth::routes();

    Route::middleware('auth')->group(function () {
    Route::get('/index', [PostController::class, 'index']);
    Route::get('/home', [PostController::class, 'index']);
    Route::get('/create', function () {
        return view('admin.products.add');
    });

    //Checkout Route
    Route::get('/checkout',[CheckoutController::class,'index']);
    Route::post('/place-order',[CheckoutController::class,'placeorder']);

    Route::post('/post', [PostController::class, 'store']);
    Route::get('/delete/{id}', [PostController::class, 'destroy']);
    Route::get('/edit/{id}', [PostController::class, 'edit']);

    Route::delete('/deleteimage/{id}', [PostController::class, 'deleteimage']);
    Route::delete('/deletecover/{id}', [PostController::class, 'deletecover']);

    Route::put('/update/{id}', [PostController::class, 'update']);
});
