<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [CustomerController::class, 'customers'])->name('home');

Route::get('/customer/{id}', [CustomerController::class, 'customer'])->name("customer");

Route::get('/order/{id}', [OrderController::class, 'order'])->name("order");

Route::get('/cancel-order/{id}', [OrderController::class, 'cancelOrder'])->name("cancel-order");

Route::get('remove-product/{orderId}/{pivotId}', [OrderController::class, 'removeProduct'])->name("remove-product");

Route::get('add-product/{orderId}/{productId}', [OrderController::class, 'addProduct'])->name("add-product");
