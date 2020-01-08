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



//Store Routes
//show all stores
Route::get('Stores','StoreController@index');

//show single store by id
Route::get('Store/{id}/show','StoreController@show');

//Create new store
Route::post('Store','StoreController@store');

//Update store
Route::put('Store','StoreController@store');

//Delete store
Route::delete('Store/{id}','StoreController@destroy');

//Show all product for a specific store
Route::get('Store/{id}','StoreController@index_product');


//le lien ahref pour voir les detail du produit
//"{{ route('shop.show',$product->name) }}"


//Product Routes
//Show all products
Route::get('Products','ProductController@index');

//Show single product by id
Route::get('Product/{id}/show','ProductController@show');

//Create new product
Route::post('Product','ProductController@store');

//Update product
Route::put('Product','ProductController@store');

//Delete Product
Route::delete('Product/{id}','ProductController@destroy');

//Route::get('/shop','ShopController@index');
//Route::get('/shop/{product}','ShopController@show');