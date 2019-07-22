<?php
use App\Http\Controllers\AdminController;

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

Route::get('/home', 'AdminController@dashboard')->name('home');
Route::get('/customer', 'HomeController@index');
//หมอ
Route::get('imageUpload', ['as'=>'imageUpload', 'uses'=>'ImageController@index']);
Route::put('imageUpload', ['as'=>'imageUploadFile', 'uses'=>'ImageController@uploadFiles']);

Route::get('/viewproducts', 'ProductController@view');

Route::get('/groups', 'GroupController@index')->name('groups');
Route::get('/products/update' ,'ProductController@update' );

Route::get('/showproduct', 'ProductController@show');

Route::get('/showproducts', 'ViewProductController@show')->name('showproducts');

Route::get('/adminhome', 'AdminController@dashboard')->name('adminhome');

Route::get('/admindashboard', 'AdminController@dashboard')->name('admindashboard');

//Using Session
Route::get('/addtocart/{id}', 'ProductController@addtocart')->name('addtocart');
Route::get('/addtocart2/{id}', 'ProductController@addtocart2')->name('addtocarttoshop');
Route::get('/profile', 'UserController@profile')->name('profile');
Route::get('/shoppingCart', 'ProductController@cart')->name('shoppingCart');
Route::get('/checkout', 'ProductController@checkout')->name('checkout');
Route::get('/reduce/{id}', 'ProductController@reducebyone')->name('reducebyone');
Route::get('/remove/{id}', 'ProductController@removeitem')->name('removeitem');

//Using Gloudeman Shopping cart
Route::post('/cart/add', 'CartItemController@add_to_cart')->name('cart.add');
Route::get('/cart', 'CartItemController@cart')->name('cart');
Route::get('/cart/delete/{id}', 'CartItemController@cart_delete')->name('cart.delete');
Route::get('/cart/incr/{id}/{qty}', 'CartItemController@incr')->name('cart.incr');
Route::get('/cart/decr/{id}/{qty}', 'CartItemController@decr')->name('cart.decr');
Route::get('/updateCart', 'CartItemController@upd')->name('updateCart');

Route::get('/editCart/{id}', 'CartController@editCart')->name('editCart');

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

Route::get('export', 'AdminController@export')->name('export');

Route::get('/addAddress', 'AddressController@create');
Route::post('/addAddress', 'AddressController@create')->name('profile.addAddress');
Route::post('/storeAddress', 'AddressController@store')->name('profile.addressStore');
Route::get('/editAddress', 'AddressController@edit')->name('profile.editAddress');
Route::delete('/destroyAddress', 'AddressController@destroy')->name('profile.destroyAddress');
Route::resource('address', 'AddressController');
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
    Route::resource('carts' ,'CartController');

    //dropzone
    Route::get('imageUpload', ['as'=>'imageUpload', 'uses'=>'ProductController@index']);
    Route::put('imageUpload', ['as'=>'imageUploadFile', 'uses'=>'ProductController@uploadFiles']);

});


// Route::get('/dashboard', function () {
//     return view('welcome');
// });


