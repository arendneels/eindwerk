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
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    $users = User::all();
    return view('welcome', compact('users'));
});

Route::get('/producttest', function(){
    $products = Product::all();
    return view('producttest', compact('products'));
});

Route::get('backtest', function(){
    return view('layouts.back');
});

Route::middleware(['back'])->group(function () {
    Route::get('/admin', function () {
        return view('back.admin');
    })->name('admin');

    Route::resource('/admin/products', 'back\ProductController');
    Route::resource('/admin/categories', 'back\CategoryController');

    Route::post('/dropzoneHandler', function(){
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
    })->name('dropzoneHandler');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
