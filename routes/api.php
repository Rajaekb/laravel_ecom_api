<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Product Routes
Route::post('Product/create','ProductController@store');
Route::get('Products','ProductController@index');
Route::get('Product/detail/{id}','ProductController@show');
Route::put('Product/update/{id}','ProductController@update');
Route::delete('Product/delete/{id}','ProductController@destroy');
Route::get('/cart','CartController@index');
Route::get('Checkout','CheckoutController@index');

//Store Routes
Route::get('Stores','StoreController@index');
Route::get('Store/{id}','StoreController@show');
Route::post('Store/create','StoreController@store');
Route::post('Store/update/{id}','StoreController@update');
Route::get('Store/{id}/index','StoreController@index');

Route::get('/shop','ShopController@index');
Route::get('/shop/{product}','ShopController@show');

//le lien ahref pour voir les detail du produit
//"{{ route('shop.show',$product->name) }}"
