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
Route::group([],function(){
    $lookbook = Product::lookbook();
    $lookbook1 = array_slice($lookbook, 0, 4);
    $lookbook2 = array_slice($lookbook, 4,4);
    $lookbook3 = array_slice($lookbook, 8, 4);
    session(compact('lookbook1', 'lookbook2', 'lookbook3'));
    Route::get('/', 'FrontController@index')->name('index');
    Route::get('/product/{id}', 'FrontController@productdetail')->where('id', '[0-9]+')->name('productdetail');
    Route::get('/about', 'FrontController@about')->name('about');
    Route::get('/contact', 'FrontController@contact')->name('contact');
});

Route::get('/producttest', function(){
    $products = Product::all();
    return view('producttest', compact('products'));
});

Route::get('backtest', function(){
    return view('layouts.back');
});

Route::get('/test', function(){
    dd(Size::kidSizes());
});

Route::post('/test/stocks', 'back\StockController@test')->name('testStock');

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
