<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\CheckoutController;
use App\Http\Controllers\Site\AccountController;


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

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

Route::view('/', 'site.pages.homepage');

Auth::routes();
require 'admin.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/product/add/cart', [ProductController::class, 'addToCart'])->name('product.add.cart');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');
// Route::get('/product/{slug}', 'Site\ProductController@show')->name('product.show');

Route::get('/cart', [CartController::class,'getCart'])->name('checkout.cart');
Route::get('/cart/item/{id}/remove', [CartController::class,'removeItem'])->name('checkout.cart.remove');
Route::get('/cart/clear', [CartController::class,'clearCart'])->name('checkout.cart.clear');


Route::middleware(['auth'])->group(function() {
    Route::get('/checkout', [CheckoutController::class, 'getCheckout'])->name('checkout.index');
    Route::post('/checkout/order', [CheckoutController::class, 'placeOrder'])->name('checkout.place.order');
});

Route::get('checkout/payment/complete', [CheckoutController::class, 'complete'])->name('checkout.payment.complete');

Route::get('account/orders', [AccountController::class, 'getOrders'])->name('account.orders');