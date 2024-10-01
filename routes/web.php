<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [ProductTypeController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});


Route::get('/certificate', function () {
    return view('certificate');
});


Route::get('/products', function () {
    return view('products');
});

// Route::get('/product-details/{productTypeName}', function () {
//     return view('product-details');
// });

Route::get('/product-details/{productTypeName}',[ProductController::class,'product_details'])->name('product.details');
