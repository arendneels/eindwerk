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

use App\Product;
use App\Role;
use App\User;

Route::get('/', function () {
    $users = User::all();
    return view('welcome', compact('users'));
});

Route::get('/producttest', function(){
    $products = Product::all();
    return view('producttest', compact('products'));
});

Route::middleware(['back'])->group(function () {
    Route::get('/admin', function () {
        return view('back.admin');
    });



});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
