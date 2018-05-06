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

Route::get('/test', function(){

    $token = \Stripe\Token::create(array(
        "card" => array(
            "number" => "4242424242424242",
            "exp_month" => 5,
            "exp_year" => 2019,
            "cvc" => "314"
        )
    ));

    $user = User::find(1);

    $user->newSubscription('main', 'premium')->create($token);
});

Route::group([],function(){
    //Place lookbook items into sessionvariable
    if(session('lookbook1') == null) {
        $lookbook = Product::lookbook();
        $lookbook1 = array_slice($lookbook, 0, 4);
        $lookbook2 = array_slice($lookbook, 4, 4);
        $lookbook3 = array_slice($lookbook, 8, 4);
        session(compact('lookbook1', 'lookbook2', 'lookbook3'));
    }

    //Routes
    Route::get('/', 'FrontController@index')->name('index');
    Route::post('/addsubscriber', 'FrontController@addsubscriber')->name('addsubscriber');
    Route::get('/product/{id}', 'FrontController@productdetail')->where('id', '[0-9]+')->name('productdetail');
    Route::get('/categories/{id}', 'FrontController@categories')->name('categories');
    Route::get('/products/{category_id1}/{category_id2?}', 'FrontController@products')->name('products');
    Route::get('/about', 'FrontController@about')->name('about');
    Route::get('/contact', 'FrontController@contact')->name('contact');
    Route::get('/search', 'FrontController@search')->name('search');

    Route::get('/history', 'FrontController@history')->middleware('auth')->name('history');
    Route::get('/editaccount', 'FrontController@editaccount')->middleware('auth')->name('editaccount');
    Route::post('/editaccount', 'FrontController@updateaccount')->middleware('auth')->name('editaccount');

    Route::get('/cart', 'front\CartController@index')->name('cart');
    Route::delete('/cart/{rowId}', 'front\CartController@destroy');
    Route::get('/cartadd/{id}', 'front\CartController@add')->name('cartadd');
    Route::get('/cartremove/{id}', 'front\CartController@remove')->name('cartremove');

});

Route::middleware(['back'])->group(function () {
    Route::get('/admin', function () {
        return view('back.admin');
    })->name('admin');

    Route::resource('/admin/products', 'back\ProductController');
    Route::resource('/admin/categories', 'back\CategoryController');
    Route::resource('/admin/users', 'back\UserController');
    Route::resource('/admin/stocks', 'back\StockController');

    Route::post('/dropzone', function(){
        $file = Input::file('file');
        $destinationPath = 'images';
        $filenameFull = Carbon::now() . $file->getClientOriginalName();
        $filename = str_replace([' ', ':', '/', '-'],'' , $filenameFull);
        $upload_success = Input::file('file')->move($destinationPath, $filename);

        if( $upload_success ) {
            return response()->json([
                'photo_name' => $filename,
                'status' => 200,
            ]);
        } else {
            return Response::json('error', 400);
        }
    })->name('dropzone');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
