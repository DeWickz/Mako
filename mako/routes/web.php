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
Route::resource('addproduct', 'ProductController');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/customer', 'HomeController@index');
Route::get('/admin_dashboard', 'AdminController@index');
