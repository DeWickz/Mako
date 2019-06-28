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

Route::get('/', 'WelcomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/customer', 'HomeController@index');
//หมอ
Route::get('imageUpload', ['as'=>'imageUpload', 'uses'=>'ImageController@index']);
Route::put('imageUpload', ['as'=>'imageUploadFile', 'uses'=>'ImageController@uploadFiles']);

Route::get('/viewproducts', 'ProductController@view');

Route::get('/groups', 'GroupController@index')->name('groups');
Route::get('/products/update' ,'ProductController@update' );

Route::get('/showproduct', 'UserController@view');

Route::resource('productsWelcome', 'ProductController');
Route::resource('productsWelcome2', 'UserController');
//Route::get('/products/{id}', 'ProductController@show');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function(){
    Route::resource('addproduct', 'ProductController');
    Route::post('addproduct/add' ,'ProductController@create' );
    Route::put('addproduct/{id}/edit' ,'ProductController@edit' );
    Route::put('products/{id}/edit' ,'ProductController@edit' );
    Route::put('products/view', 'ProductController@view');
    Route::put('products/create', 'ProductController@create');
    // Route::put('products/cart/{id}' ,'CartController@store' );
    Route::resource('admin_dashboard', 'HomeController');
    Route::resource('home', 'HomeController');
    Route::resource('products', 'ProductController');
    Route::resource('orders', 'OrderController');
    Route::resource('groups', 'GroupController');
    Route::resource('stocks', 'StockController');
    Route::resource('cart' ,'CartController');

    //dropzone
    Route::get('imageUpload', ['as'=>'imageUpload', 'uses'=>'ProductController@index']);
    Route::put('imageUpload', ['as'=>'imageUploadFile', 'uses'=>'ProductController@uploadFiles']);

});


// Route::get('/dashboard', function () {
//     return view('welcome');
// });


