<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function categories($id){
        $mainCategory = Category::findOrFail($id);
        $productIds = $mainCategory->products()->pluck('products.id')->all();
        $categoryIds = DB::table('category_product')
            ->whereIn('product_id', $productIds)
            ->whereNotIn('category_id', [$mainCategory->id])
            ->pluck('category_id');
        $categories = Category::whereIn('categories.id', $categoryIds)->paginate(4);
        return view('front.allcat', compact('mainCategory', 'categories', 'productIds'));
    }

    public function about(){
        return view('front.about');
    }

    public function contact(){
        return view('front.contact');
    }
}
