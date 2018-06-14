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

use App\Photo;
use App\Product;
use App\Role;
use App\Size;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Stripe\Stripe;

//Front Routes
Route::group([],function(){
    Route::get('/', 'FrontController@index')->name('index');
    Route::post('/addsubscriber', 'FrontController@addsubscriber')->name('addsubscriber');
    Route::get('/product/{id}', 'FrontController@productdetail')->where('id', '[0-9]+')->name('productdetail');
    Route::post('/addreview/{id}', 'FrontController@addReview')->name('addreview');
    Route::get('/categories/{id}', 'FrontController@categories')->name('categories');
    Route::get('/products/{category_id1}/{category_id2?}', 'FrontController@products')->name('products');
    Route::get('/about', 'FrontController@about')->name('about');
    Route::get('/terms-of-conditions', 'FrontController@terms')->name('terms');

    Route::get('/contact', 'FrontController@contact')->name('contact');
    Route::post('/contact', 'FrontController@addContactMsg')->name('contact.add');

    Route::get('/search', 'FrontController@search')->name('search');

    Route::get('/history', 'FrontController@history')->middleware('auth')->name('history');
    Route::get('/editaccount', 'FrontController@editaccount')->middleware('auth')->name('editaccount');
    Route::post('/editaccount', 'FrontController@updateaccount')->middleware('auth')->name('editaccount');

    Route::get('/cart', 'front\CartController@index')->name('cart');
    Route::delete('/cart/{rowId}', 'front\CartController@destroy');
    Route::get('/cartadd/{id}', 'front\CartController@add')->name('cartadd');
    Route::get('/cartremove/{id}', 'front\CartController@remove')->name('cartremove');

    Route::post('/paymentsuccess', 'front\CartController@paymentSuccess')->name('payment.success');

});

//Back routes
Route::middleware(['back'])->group(function () {
    Route::get('/admin', 'back\AdminController@index')->name('admin');

    Route::resource('/admin/products', 'back\ProductController');
    Route::resource('/admin/categories', 'back\CategoryController');
    Route::resource('/admin/users', 'back\UserController');
    Route::resource('/admin/stocks', 'back\StockController');
    Route::resource('/admin/orders', 'back\OrderController');
    Route::put('/admin/order/ready/{order}', 'back\OrderController@orderReady')->name('orders.ready');
    Route::put('admin/order/delivered/{order}', 'back\OrderController@orderDelivered')->name('orders.delivered');
    Route::get('/admin/neworders', 'back\OrderController@newOrders')->name('orders.new');
    Route::get('/admin/reviews', 'back\ReviewController@index')->name('reviews');
    Route::get('/admin/validatereview/{id}', 'back\ReviewController@validateReview')->name('review.validate');
    Route::delete('/admin/delete/{id}', 'back\ReviewController@destroy')->name('review.destory');
    Route::get('/admin/messages', 'back\MessageController@index')->name('messages.index');
    Route::get('/admin/messages/{id}', 'back\MessageController@show')->name('messages.show');

    Route::post('/dropzone', 'back\DropzoneController@add')->name('dropzone');
});

//Authorization routes
Auth::routes();
