<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PetstoreIO\UserController;

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
Route::get('/', [ProductsController::class, 'index'])->name('index')->middleware();

Route::get('/product-details/{id}', [ProductsController::class, 'getProductByID']);
Route::get('/search', [ProductsController::class, 'search']);
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard')->middleware(['auth', 'isAdmin']);
    //User
    //Delete-User
    Route::get('/delete-user/{id}', [UsersController::class, 'destroy'])->middleware(['auth', 'isAdmin']);
    //View User
    Route::get('/dashboard/users', [UsersController::class, 'adminindex'])->middleware(['auth', 'isAdmin']);
    //Order
    //Edit Order
    Route::get('/edit-order/{id}', [OrdersController::class, 'edit'])->middleware(['auth', 'isAdmin']);
    Route::post('/edit-order/{id}', [OrdersController::class, 'update'])->middleware(['auth', 'isAdmin']);
    //Delete-Order
    Route::get('/delete-order/{id}', [OrdersController::class, 'destroy'])->middleware(['auth', 'isAdmin']);
    //View Order
    Route::get('/dashboard/orders', [OrdersController::class, 'adminindex'])->middleware(['auth', 'isAdmin']);
    //Product
    //Delete Product
    Route::get('/delete-product/{id}', [ProductsController::class, 'destroy'])->middleware(['auth', 'isAdmin']);
    //Edit Product 
    Route::get('/edit-product/{id}', [ProductsController::class, 'edit'])->middleware(['auth', 'isAdmin']);
    Route::post('/edit-product/{id}', [ProductsController::class, 'update'])->middleware(['auth', 'isAdmin']);
    //Add Product
    Route::get('/dashboard/add-product', [ProductsController::class, 'create'])->middleware(['auth', 'isAdmin']);
    Route::post('/dashboard/add-product', [ProductsController::class, 'store'])->middleware(['auth', 'isAdmin']);
    //View Product
    Route::get('/dashboard/product', [ProductsController::class, 'adminindex'])->middleware(['auth', 'isAdmin']);
    Route::get('/home', [HomeController::class, 'checkUserType'])->middleware(['auth']);
});
