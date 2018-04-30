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
        return view('front.allcat', compact('mainCategory', 'categories', 'productIds', 'allProducts'));
    }

    public function products($category_id1, $category_id2 = null){
        $category1 = Category::findOrFail($category_id1);
        $productIds = $category1->products()->pluck('products.id')->all();
        if($category_id2){
            $category2 = Category::findOrFail($category_id2);
            $allProducts = $category2->products()->whereIn('products.id', $productIds)->paginate(20);
            return view('front.allprod', compact('category1','category2', 'allProducts'));
        }
        $allProducts = $category1->products()->paginate(20);
        return view('front.allprod', compact('category1', 'allProducts'));
    }

    public function about(){
        return view('front.about');
    }

    public function contact(){
        return view('front.contact');
    }
}
