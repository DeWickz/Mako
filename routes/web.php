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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/customer', 'HomeController@index');
//หมอ
Route::post ('Dropzone' ,'ProductController@dropzone' )->name('dropzone');


Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function(){
    Route::resource('addproduct', 'ProductController');
    Route::post('addproduct/add' ,'ProductController@create' );
    Route::put('addproduct/{id}/edit' ,'ProductController@edit' );
    Route::put ('products/{id}/edit' ,'ProductController@edit' );
    Route::resource('admin_dashboard', 'HomeController');
    Route::resource('home', 'HomeController');
    Route::resource('products', 'ProductController');
    Route::resource('orders', 'OrderController');
    Route::resource('groups', 'GroupController');

    //dropzone
    Route::get('imageUpload', ['as'=>'imageUpload', 'uses'=>'ProductController@index']);
    Route::put('imageUpload', ['as'=>'imageUploadFile', 'uses'=>'ProductController@uploadFiles']);

});


// Route::get('/dashboard', function () {
//     return view('welcome');
// });


// Route::get('/products', function(){
//     return view('viewproduct');
// });
// Route::get('/admin/adding', function(){
//     return view('addproduct');
// });
// Route::get('/admin/removing', function(){
//     return view('removeproduct');
// });

// Route::resource('addproduct', 'ProductController');
// Route::post('addproduct/add' ,'ProductController@create' );
// Route::put('addproduct/{id}/edit' ,'ProductController@edit' );
// Route::resource('admin_dashboard', 'HomeController');
// Route::resource('products', 'ProductController');
// Route::resource('orders', 'OrderController');




