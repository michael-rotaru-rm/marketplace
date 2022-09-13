<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

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

Route::get('/', [ProductController::class, 'list']);
Route::get('/product/{product:slug}', [ProductController::class, 'show']);
Route::get('login', [SessionsController::class, 'create'])->name('login');
Route::post('login', [SessionsController::class, 'store']);
Route::post('logout', [SessionsController::class, 'destroy']);
Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);

Route::get('admin/products/create', [AdminProductController::class, 'create'])->middleware('auth');
Route::post('admin/products/create', [AdminProductController::class, 'store'])->middleware('auth');
Route::get('admin/products', [AdminProductController::class, 'index'])->middleware('auth');
Route::get('admin/products/{product}/edit', [AdminProductController::class, 'edit'])->middleware('auth');
Route::patch('admin/products/{product}', [AdminProductController::class, 'update'])->middleware('auth');
Route::delete('admin/products/{product}', [AdminProductController::class, 'destroy'])->middleware('auth');