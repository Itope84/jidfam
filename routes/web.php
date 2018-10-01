<?php

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

Route::get('/', function () {
    return redirect('home');
});

Route::get('/catalog', 'ProductController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products', 'ProductController@index')->name('products');

Route::get('/products/{product}', 'ProductController@show')->name('product.single');

Route::get('/api/cart', 'CartController@index')->name('cart');

Route::post('/api/cart/clear', 'CartController@clear')->name('cart.clear');

Route::post('/api/cart', 'CartController@update')->name('cart.update');

Route::get('/user/cart', 'CartController@show')->name('cart.show');

Route::get('/checkout', 'OrderController@startcheckout');

// Route::get('/products/{}')