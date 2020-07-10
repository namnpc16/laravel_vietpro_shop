<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
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

// login
Route::get('login', 'Backend\AdminController@login')->name('login.get');
Route::get('logout', 'Backend\AdminController@logout')->name('logout.get');
Route::post('login', 'Backend\AdminController@post_login');

// Frontend
Route::group(['prefix' => '/', 'namespace' => 'Frontend'], function () {
    Route::get('', 'FrontendController@index')->name('frontend.index');

    Route::group(['prefix' => 'products', 'namespace' => 'Product'], function () {
        Route::get('/shop', 'ProductController@shop')->name('product.shop');
        Route::get('/detail', 'ProductController@detail')->name('product.detail');
    });

    Route::group(['prefix' => 'cart', 'namespace' => 'Cart'], function () {
        Route::get('/', 'CartController@cart')->name('cart');
        Route::get('/checkout', 'CartController@checkout')->name('checkout');
        Route::get('/complete', 'CartController@complete')->name('complete');
    });

    Route::get('/about', 'FrontendController@about')->name('about');
    Route::get('/contact', 'FrontendController@contact')->name('contact');
});

// Backend
Route::group(['prefix' => 'admin', 'namespace' => 'Backend'], function () {
    Route::get('', 'AdminController@index')->name('admin.index');    
    // products
    Route::group(['prefix' => 'products', 'namespace' => 'Product'], function () {
        Route::get('/', 'ProductController@list_product')->name('product.index');
        Route::get('/create', 'ProductController@add_product')->name('product.create');
        Route::post('/store', 'ProductController@store_product')->name('product.store');
        Route::get('/edit/{id}', 'ProductController@edit_product')->name('product.edit');
        Route::post('/save/{id}', 'ProductController@save_product')->name('product.save');
        Route::get('/del/{id}', 'ProductController@del_product')->name('product.del');

        Route::get('/active/{id}', 'ProductController@active_product')->name('product.active');
        Route::get('/deactive/{id}', 'ProductController@deactive_product')->name('product.deactive');
    });
    // Categories
    Route::group(['prefix' => 'categories', 'namespace' => 'Category'], function () {
        Route::get('/', 'CategoryController@list_category')->name('category.index');
        Route::post('/create', 'CategoryController@add_category')->name('category.create');
        Route::get('/edit/{id}', 'CategoryController@edit_category')->name('category.edit');
        Route::post('/edit/{id}', 'CategoryController@save_category')->name('category.save');
        Route::get('/del/{id}', 'CategoryController@del_category')->name('category.del');
    });
    // Users
    Route::group(['prefix' => 'users', 'namespace' => 'User'], function () {
        Route::get('/', 'UserController@list_user')->name('user.index');
        Route::get('/create', 'UserController@add_user')->name('user.create');
        Route::get('/edit', 'UserController@edit_user')->name('user.edit');
        Route::get('/del', 'UserController@del_user')->name('user.del');
    });
    // Orders
    Route::group(['prefix' => 'orders', 'namespace' => 'Order'], function () {
        Route::get('/', 'OrderController@orders')->name('order');
        Route::get('/detail', 'OrderController@order_detail')->name('order.detail');
        Route::get('/process', 'OrderController@process')->name('order.process');
    });
});


// Route::get('test', function () {
//     $name = 'phuong nam';
//     $bsc = bcrypt($name);
//     $encode = Hash::make($name);
//     echo $encode;
//     echo "<br>";
//     echo $bsc;
//     if (Hash::check($name, $encode))
//     {
//         dd(1);
//     }
// });