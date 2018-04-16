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


    Route::get('/', 'ShoppingController@index')->name('home');

Route::get('/products', 'ShoppingController@products')->name('products');

Route::get('/product/{productid}', 'ShoppingController@getProduct')->name('products');

Route::get('/products/{category}', 'ShoppingController@productsByCategory')->name('products');

Auth::routes();

Route::get('/admin/home', 'HomeController@index')->name('home');


Route::view('/admin/categories', 'admin.categories');



Route::get('/load-categories', 'ProductsController@getCategories')->name('categories');

Route::post('/edit-category', 'ProductsController@editCategory')->name('categories');

Route::post('/save-category', 'ProductsController@saveCategory')->name('categories');

Route::post('/delete-category', 'ProductsController@deleteCategory')->name('categories');

/* products page */


Route::view('/admin/products', 'admin.products');

Route::get('/admin/product/{productid}', 'ProductsController@editProduct')->name('products');

Route::post('/save-product', 'ProductsController@saveProduct')->name('products');

Route::post('/upload-image', 'ProductsController@uploadImage')->name('products');

Route::post('/load-photos', 'ProductsController@getPhotos')->name('products');

Route::post('/update-active-product', 'ProductsController@updateProductActive')->name('products');

Route::post('/update-featured-product', 'ProductsController@updateProductFeatured')->name('products');

Route::post('/delete-product', 'ProductsController@deleteProduct')->name('products');

Route::get('/load-products', 'ProductsController@getProducts')->name('products');