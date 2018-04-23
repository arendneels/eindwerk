<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view('front.index');
    }

    public function productdetail($id){
        $product = Product::findOrFail($id);
        return view('front.productdetail', compact('product'));
    }

    public function about(){
        return view('front.about');
    }
}
