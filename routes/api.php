<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/products', 'ProductController@get');
Route::get('/products/{id}', 'ProductController@getById');
Route::post('/product_post', 'ProductController@post');
Route::put('/product_put/{id}', 'ProductController@put');
Route::delete('/product_delete/{id}', 'ProductController@delete');