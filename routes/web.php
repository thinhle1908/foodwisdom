<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UsersController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PetstoreIO\UserController;
use Stripe\Stripe;

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
    Route::get('/user/profile', [UserProfileController::class, 'profile'])->middleware(['auth']);
    Route::post('/user/profile', [UserProfileController::class, 'update'])->middleware(['auth']);
    Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('cart-remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('cart-update', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
    Route::get('/checkout', [CheckOutController::class, 'index'])->middleware(['auth'])->name('checkout.index');
    Route::post('/checkout', [CheckOutController::class, 'payment'])->name('checkout.payment')->middleware(['auth']);
 
});
Route::post('webhook', [StripeController::class, 'webhook']);

