<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\UsersModel;


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

// login - logout
Route::get('login', 'Backend\AdminController@login')->name('login.get')->middleware('CheckLogout');
Route::get('logout', 'Backend\AdminController@logout')->name('logout');
Route::post('login', 'Backend\AdminController@post_login')->name('login');

// Frontend
Route::group(['prefix' => '/', 'namespace' => 'Frontend'], function () {
    Route::get('', 'FrontendController@index')->name('frontend.index');

    Route::group(['prefix' => 'products', 'namespace' => 'Product'], function () {
        Route::get('/shop', 'ProductController@shop')->name('product.shop');
        Route::post('/shop', 'ProductController@shop')->name('product.range');
        Route::get('/{slug}.html', 'ProductController@detail')->name('product.detail');
    });

    Route::group(['prefix' => 'cart', 'namespace' => 'Cart'], function () {
        Route::get('/', 'CartController@cart')->name('cart');
        Route::get('/checkout', 'CartController@checkout')->name('checkout');
        Route::get('/update/{id}/{qty}', 'CartController@update')->name('update.cart');
        Route::get('/delete/{id}', 'CartController@delete')->name('delete.cart');
        Route::get('/complete', 'CartController@complete')->name('complete');
        Route::post('/create', 'CartController@create')->name('create.cart');
        Route::get('/create', 'CartController@create')->name('create.cart');
        
        Route::get('/success', 'CartController@success')->name('success.cart');
        Route::post('/success', 'CartController@success')->name('success.cart');
    });

    Route::get('/about', 'FrontendController@about')->name('about');
    Route::get('/contact', 'FrontendController@contact')->name('contact');
});

// Backend
Route::group(['prefix' => 'admin', 'namespace' => 'Backend', 'middleware' => 'CheckLogin'], function () {
    Route::get('', 'AdminController@index')->name('admin.index');    
    // products 
    Route::group(['prefix' => 'products', 'namespace' => 'Product'], function () {
        Route::get('/', 'ProductController@all')->name('product.index');
        Route::get('/create', 'ProductController@create')->name('product.create');
        Route::post('/store', 'ProductController@store')->name('product.store');
        Route::get('/edit/{id}', 'ProductController@edit')->name('product.edit');
        Route::post('/save/{id}', 'ProductController@save')->name('product.save');
        Route::get('/del/{id}', 'ProductController@delete')->name('product.del');

        Route::get('/status/{id}', 'ProductController@status')->name('product.status');
    });
    // Categories
    Route::group(['prefix' => 'categories', 'namespace' => 'Category'], function () {
        Route::get('/', 'CategoryController@all')->name('category.index');
        Route::post('/create', 'CategoryController@create')->name('category.create');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::post('/edit/{id}', 'CategoryController@save')->name('category.save');
        Route::get('/del/{id}', 'CategoryController@delete')->name('category.del');
    });
    // Users
    Route::group(['prefix' => 'users', 'namespace' => 'User'], function () {
        Route::get('/', 'UserController@all')->name('user.index');
        Route::get('/create', 'UserController@create')->name('user.create');
        Route::post('/store', 'UserController@store')->name('user.store');
        Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
        Route::post('/update/{id}', 'UserController@update')->name('user.update');
        Route::get('/del/{id}', 'UserController@delete')->name('user.del');
    });
    // Orders
    Route::group(['prefix' => 'orders', 'namespace' => 'Order'], function () {
        Route::get('/', 'OrderController@orders')->name('order.index');
        Route::get('/detail/{id}', 'OrderController@detail')->name('order.detail');
        Route::get('/process', 'OrderController@process')->name('order.process');
        Route::post('/process/{id}', 'OrderController@status')->name('order.status');
    });
});

// Route::post('ajax', 'UserController@search')->name('ajax');

Route::post('ajax', function(Request $request){
    $ouput = '';
    $result = UsersModel::where('name', 'like', '%' . $request->input('search') . '%')->orWhere('email', 'like', '%' . $request->input('search') . '%')->get();
    $ouput .= '';

    return json_decode($result);
})->name('ajax');

Route::post('/delete', function (Request $request) {
    $id = $request->input('id');

    $user = UsersModel::find($id);
    
    $user->delete();

    return response()->json([
        'message' => 'Data delete successfully!'
    ]);
})->name('delete.user');


// Route::get('/delete-file', function () {
//     $delete_img = storage_path('app/public/tzuyu01.jpg');
//     echo $delete_img;
//     if(\File::exists($delete_img)){
//         \File::delete($delete_img);
//         dd('success');
//     }else{
//         dd('File does not exists.');
//     }
// });


Route::view('/view', 'welcome', ['name' => 'Phương Nam'])->name('view');

Route::get('users/{id?}', function ($postID = 0) {
        echo $postID;
})->where('id', '.*');

// Hàm được gọi khi không tìm thấy route
//Route::fallback('Backend\AdminController@fallBack');


Route::middleware('throttle:10|1,1')->group(function () {
    Route::get('/throttle', function () {
        
    });
});


Route::post('/rq', function (Request $request){
    echo $request->method();
////    echo $request->url();
//    if($request->filled(['demo1', 'demo'])){
//        dd('ok');
//    }
    if(isset($request)){
        dd('ok');
    }
})->name('rq');


Route::get('/set-cookie', function (){
    Cookie::queue(Cookie::make('name1', 'valueadsfasd', 10));
});
Route::get('/rm-cookie', function (){
    $rm = Cookie::forget('name1');

    return response('adf')->withCookie($rm);
});
Route::get('/get-cookie', function (){
    echo Cookie::get('name1');
});

Route::get('/json', function (){
    return response()->json([
        'name' => 'phuong nam',
        'age' => 20
    ]);
});

// Route::get('/file', function (){
//     return response()->file(public_path('img/669481596098401.jpg'), 'Content-Type');
// });

Route::get('/ss-get', function (){

    return session()->get('name1');
//    return session()->all();
});

Route::get('/ss-put', function (){
    return session(['name' => 'phuong nam', 'name1' => 'phuong nam 1']);
//    return session()->put('name', 'phuong nam');
});

Route::get('/ss-delete', function (){
    if(session()->has('name')){
        dd(12);
    }
    return session()->forget('name');
});

Route::get('/ss-pull', function (){
    return session()->pull('name');
});

Route::get('/abort', function (){
    abort(400);
});


Route::get('/date', function(){
    $date = date('d/m/Y H:i:s');
//    $date = '01/07/2020';
    echo date('d/m/Y',strtotime('+30 days',strtotime(str_replace('/', '-', $date)))) . PHP_EOL;
    echo '<br>';
    echo $date;



});


Route::get('/collec', 'Controller@index');
Route::get('/bind', 'Controller@bind');
Route::get('/event', 'Controller@event');
Route::get('/job', 'Controller@job');

