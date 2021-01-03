<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Product;
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

Route::get('products', 'ProductController@all');
Route::get('products/{id}', 'ProductController@get');
Route::post('products', 'ProductController@store');
Route::put('products/{id}', 'ProductController@update');
Route::delete('products/{id}', 'ProductController@delete');

Route::get('sales', 'SaleController@all');
Route::get('sales/{id}', 'SaleController@get');
Route::post('sales', 'SaleController@store');
Route::put('sales/{id}', 'SaleController@update');
Route::delete('sales/{id}', 'SaleController@delete');


Route::get('stocks', 'StockController@all');
Route::get('stocks/{id}', 'StockController@get');
Route::post('stocks', 'StockController@store');
Route::put('stocks/{id}', 'StockController@update');
Route::delete('stocks/{id}', 'StockController@delete');
