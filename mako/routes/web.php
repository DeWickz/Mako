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

Route::get('/products', function(){
    return view('viewproduct');
});
Route::get('/admin/adding', function(){
    return view('addproduct');
});
Route::get('/admin/removing', function(){
    return view('removeproduct');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function(){
Route::resource('addproduct1', 'ProductController@test');
Route::resource('addproduct', 'ProductController');
Route::resource('admin_dashboard', 'AdminController');
});


