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

Route::get('/showproduct', 'ProductController@show');

Route::get('/showproducts', 'ViewProductController@show')->name('showproducts');

Route::get('/adminhome', 'HomeController@index')->name('adminhome');

Route::get('/addtocart/{id}', 'ProductController@addtocart')->name('addtocart');

Route::get('/addtocart2/{id}', 'ProductController@addtocart2')->name('addtocart2');

Route::get('/profile', 'UserController@profile')->name('profile');

Route::get('/shoppingCart', 'ProductController@cart')->name('shoppingCart');

Route::get('/checkout', 'ProductController@checkout')->name('checkout');

Route::get('/reduce/{id}', 'ProductController@reducebyone')->name('reducebyone');

Route::get('/remove/{id}', 'ProductController@removeitem')->name('removeitem');

Route::get('/usertest',function()
{
    return view('profile.userinfo');
})->name('profile.userinfo');

Route::resource('productsWelcome', 'ProductController');
Route::resource('productsWelcome2', 'UserController');
// Route::resource('addtocart', 'ProductController');
//Route::get('/products/{id}', 'ProductController@show');

Route::get('/userinfo', 'UserController@userinfo')->name('profile.userinfo');
Route::get('/personal', 'UserController@personal')->name('profile.personal');
Route::get('/addressbook', 'UserController@addressbook')->name('profile.addressbook');
Route::get('/payment', 'UserController@payment')->name('profile.payment');
Route::get('/editPersonal/{id}', 'UserController@editPersonal')->name('profile.editPersonal');
Route::get('/updatePersonal', 'UserController@updatePersonal')->name('profile.updatePersonal');

Route::post('/addAddress', 'UserController@create')->name('profile.addAddress');
// Route::resource('editPersonal', 'UserController');

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


