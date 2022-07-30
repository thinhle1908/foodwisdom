<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductsApiController;
use App\Models\User;
use GrahamCampbell\ResultType\Success;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware'=>'api','prefix'=>'auth'], function($router){
    Route::post('/register',[AuthController::class, 'register']);
    Route::post('/login',[AuthController::class, 'login']);
    Route::get('/profile',[AuthController::class, 'profile']);
    Route::post('/logout',[AuthController::class, 'logout']);
});

Route::get('/products',[ProductsApiController::class,'index']); 
Route::post('/products',[ProductsApiController::class,'store']);
Route::put('/products/{product}',[ProductsApiController::class,'update']);
Route::delete('/products/{product}',[ProductsApiController::class,'destroy']);
Route::get('/search',[ProductsApiController::class,'search']);
Route::get('/products/{product}',[ProductsApiController::class,'getProductByID']);





