<?php

use App\Http\Controllers\WEB\CustomerWebController;
use App\Http\Controllers\WEB\ProductCategoryWebController;
use App\Http\Controllers\WEB\ProductWebController;
use App\Http\Controllers\WEB\TransactionDetailWebController;
use App\Http\Controllers\WEB\ViewWebController;
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

Route::get('/loginIndex', [ViewWebController::class, 'loginIndex']);
Route::get('/registerIndex', [ViewWebController::class, 'registerIndex']);


Route::get('/', [ViewWebController::class, 'berandaView']);

//Customer
Route::get('/customer/index', [ViewWebController::class, 'customerView']);
Route::get('/customer/create-index', [ViewWebController::class, 'customerCreateView']);
Route::POST('/customer/create', [CustomerWebController::class, 'create']);
Route::GET('/customer/delete/{id}', [CustomerWebController::class, 'delete']);
//product category
Route::get('/product-category/index', [ViewWebController::class, 'productCategoryView']);
Route::get('/product-category/create-index', [ViewWebController::class, 'productCategoryCreateView']);
Route::get('/product-category/edit-index/{id}', [ViewWebController::class, 'productCategoryEditView']);
Route::post('/product-category/create', [ProductCategoryWebController::class, 'create']);
Route::post('/product-category/edit', [ProductCategoryWebController::class, 'update']);
Route::get('/product-category/delete/{id}', [ProductCategoryWebController::class, 'delete']);
//transaksi detail
Route::get('/transaction-detail/index', [ViewWebController::class, 'transactionDetailView']);
Route::get('/transaction-detail/create-index', [ViewWebController::class, 'transactionDetailCreateView']);

Route::get('/transaction-detail/delete/{id}', [TransactionDetailWebController::class, 'delete']);




//product
Route::get('/product/index', [ViewWebController::class, 'productView']);
Route::get('/product/delete/{id}', [ProductWebController::class, 'delete']);
