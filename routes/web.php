<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Site\ProductController;


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
