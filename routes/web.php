<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [ProductsController::class, 'index']);
Route::get('/product-details/{id}', [ProductsController::class, 'getProductByID']);
Route::get('/search', [ProductsController::class, 'search']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');;
});
//Delete Product
Route::get('/delete-product/{id}',[ProductsController::class,'destroy']);
//Edit Product 
Route::get('/edit-product/{id}',[ProductsController::class,'edit']);
Route::post('/edit-product/{id}',[ProductsController::class,'update']);
//Add Product
Route::get('/dashboard/add-product',[ProductsController::class,'create']);
Route::post('/dashboard/add-product',[ProductsController::class,'store']);
//View Product
Route::get('/dashboard/product', [ProductsController::class, 'adminindex']);
