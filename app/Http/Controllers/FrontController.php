<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Http\Requests\AddSubRequest;
use App\Http\Requests\front\UserEditRequest;
use App\Product;
use App\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index(){
        return view('front.index');
    }

    public function addsubscriber(AddSubRequest $request){
        //Add email to the subscriber list in database
        Subscriber::create($request->all());
        return redirect()->back();
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

    public function search(Request $request){
        $searchterm = $request->all()['term'];
        $productsQuery = Product::where('name', 'like', $searchterm . "%");
        //Get total count for counter on search page
        $count = $productsQuery->count();
        //Get paginated results
        $products = $productsQuery->paginate(20)->withPath('?term=' . $searchterm);
        return view('front.search', compact('products', 'count'));
    }

    public function history(){
        return view('front.history');
    }

    public function editaccount(){
        $user = Auth::user();
        $countriesSelect = Country::countriesSelect();
        return view('front.editaccount', compact('user', 'countriesSelect'));
    }

    public function updateaccount(UserEditRequest $request){
        $user = Auth::user();
        $input = $request->all();
        if($input['password'] == null){
            $input = array_except($input, ['password']);
        }else{
            $input['password'] = bcrypt($input['password']);
        }
        $user->update($input);
        return redirect()->back();
    }
}
