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
        $hasSizesOutOfStock = $product->hasSizesOutOfStock();
        return view('front.productdetail', compact('product', 'hasSizesOutOfStock'));
    }

    public function about(){
        return view('front.about');
    }

    public function contact(){
        return view('front.contact');
    }
}
