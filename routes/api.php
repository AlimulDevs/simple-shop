<?php

use App\Http\Controllers\API\AbsenApiController;
use App\Http\Controllers\API\CartApiController;
use App\Http\Controllers\API\JadwalApiController;
use App\Http\Controllers\API\KelasApiController;
use App\Http\Controllers\API\ProductApiController;
use App\Http\Controllers\API\ProductCategoryApiController;
use App\Http\Controllers\API\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::POST('/customer/register', [UserApiController::class, "registerCustomer"]);
Route::POST('/admin/register', [UserApiController::class, "registerAdmin"]);
Route::POST('/login', [UserApiController::class, "login"]);



Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::GET('/profile', [UserApiController::class, "profile"]);
    Route::PUT('/profile', [UserApiController::class, "editProfile"]);

    //product category
    Route::GET('/product-category', [ProductCategoryApiController::class, "getAll"]);
    Route::GET('/product-category/{id}', [ProductCategoryApiController::class, "getById"]);
    Route::POST('/product-category', [ProductCategoryApiController::class, "create"]);
    Route::PUT('/product-category/{id}', [ProductCategoryApiController::class, "update"]);
    Route::DELETE('/product-category/{id}', [ProductCategoryApiController::class, "delete"]);
    //product 
    Route::GET('/product', [ProductApiController::class, "getAll"]);
    Route::GET('/product/{id}', [ProductApiController::class, "getById"]);
    Route::POST('/product', [ProductApiController::class, "create"]);
    Route::POST('/product/{id}', [ProductApiController::class, "update"]);
    Route::DELETE('/product/{id}', [ProductApiController::class, "delete"]);
    //cart 
    Route::GET('/cart', [CartApiController::class, "getAll"]);
    Route::GET('/cart/{id}', [CartApiController::class, "getById"]);
    Route::POST('/cart', [CartApiController::class, "create"]);
    Route::PUT('/cart/{id}', [CartApiController::class, "update"]);
    Route::DELETE('/cart/{id}', [CartApiController::class, "delete"]);
});
