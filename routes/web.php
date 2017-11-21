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
    return view('pages.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pages/cart', 'HomeController@cart')->name('pages.cart');
Route::get('/checkout', 'HomeController@checkout')->name('pages.checkout');
Route::get('/product', 'HomeController@shop')->name('pages.shop');
Route::get('/product/brand/{name}', 'HomeController@brandProduct')->name('pages.brandpro');
Route::get('/product/{name}', 'HomeController@CatProduct')->name('pages.catpro');
Route::get('/product_detail', 'HomeController@product_detail')->name('pages.product-detail');
Route::get('/product_details/{id}', 'HomeController@product_details')->name('pages.product-details');
//Route::get('/blog', 'HomeController@blog')->name('pages.blog');
Route::view('/blog', 'pages.blog')->name('pages.blog');
Route::get('/blog_single', 'HomeController@blog_single')->name('pages.blog-single');
Route::get('/contact', 'HomeController@contact')->name('pages.contact');

Route::post('/search','HomeController@search')->name('search');

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::get('/cart/addItem/{id}', 'CartController@additem')->name('cart.addItem'); 
Route::get('/cart/remove/{id}', 'CartController@destroy')->name('cart.destroy'); 
Route::get('/cart/update/{id}', 'CartController@update');

Route::get('/addWishlist/{id}','CheckoutController@addWishlist')->name('addWishlist');
Route::get('/viewWishlist','CheckoutController@viewWishlist')->name('viewWishlist');
Route::get('/deleteWishlist/{id}','CheckoutController@deleteWishlist')->name('deleteWishlist');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout/store', 'CheckoutController@store')->name('checkout.store');
Route::put('/checkout/update{id}', 'CheckoutController@update')->name('checkout.update');

Route::get('/profile', 'ProfileController@index')->name('profile.index');
Route::get('/address', 'ProfileController@address')->name('profile.myaddress');
Route::get('/myorder', 'ProfileController@order')->name('profile.myorder');
Route::put('/profile/edit{id}', 'ProfileController@edit')->name('profile.edit');
Route::put('/address/edit{id}', 'ProfileController@address_edit')->name('address.edit');
Route::get('/password', 'ProfileController@password')->name('profile.password');
Route::put('/password/edit{id}', 'ProfileController@password_edit')->name('password.edit');

Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin','ProductController@index')->name('admin.dashboard');
Route::get('/admin/logout','Auth\AdminLoginController@logout')->name('admin.logout');

Route::post('/admin/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('/admin/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/admin/password/reset', 'Auth\AdminResetPasswordController@reset');
Route::get('/admin/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

Route::resource('admin/product','ProductController');


