<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

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

Route::get('/products', function () {
    return view('products',['products' => Product::all()]);
});


Route::get('/product/{product:slug}', function (Product $product) {
    return view('product', [
        'product' => $product
    ]);
});