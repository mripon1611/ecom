<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

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


/**
 * User controlling
 */

 //login page view
Route::get('/login', function () {
    return view('login');
});
//login submission and validate
Route::post('/login', [UserController::class, 'login']);
//registration page view
Route::get('/register', function () {
    return view('register');
});
//registration submit and validation
Route::post('/register', [UserController::class, 'register']);

Route::get('/', [ProductController::class, 'index']);
Route::get('detail/{id}', [ProductController::class, 'detail']);


// logot and pull the session 
Route::get('/logout', function() {
    if(session()->has('user')) {
        session()->pull('user');
    }
    return redirect('/');
});

Route::post('/add_to_cart', [ProductController::class, 'addToCart']);

// Show cart item page
Route::get('/show-cart',[ProductController::class, 'showCart']);

// Detele items from the cart
Route::get('/delete-from-cart/{id}', [ProductController::class, 'deleteFromCart']);

// Order now from show-cart list
Route::get('/order-now', [OrderController::class, 'orderNow']);

// View Orders
Route::get('/order-view', [OrderController::class, 'myOrder']);

// place order
Route::post('/confirm-order', [OrderController::class, 'confirmOrder']);