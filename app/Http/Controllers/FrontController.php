<?php

namespace App\Http\Controllers;

use App\Category;
use App\Color;
use App\Country;
use App\Http\Requests\AddReviewRequest;
use App\Http\Requests\AddSubRequest;
use App\Http\Requests\front\UserEditRequest;
use App\Message;
use App\Product;
use App\Review;
use App\Size;
use App\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

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
        //Eager load users + Limit reviews to 5 reviews per page
        $reviews = $product->reviews()->with('user')->paginate(5);
        return view('front.productdetail', compact('product', 'hasSizesOutOfStock', 'reviews'));
    }

    public function addReview($id, AddReviewRequest $request){
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $input['product_id'] = $id;
        Review::create($input);
        Session::flash('message', "Thank you for your feedback, once the message has been validated it will be shown on this page.");
        return redirect()->back();
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

    public function products($category_id1, $category_id2 = null, Request $request){
        $category1 = Category::findOrFail($category_id1);
        $productIds = $category1->products()->pluck('products.id')->all();
        $priceRange = null;

        //Select boxes variables
        $colorsSelect = Color::colorsSelect();
        if($category1->id == 4){
            $sizes = Size::shoeSizes();
            $sizesSelect = Size::sizesSelect($sizes);
        }elseif($category1->id == 3 ){
            $sizes = Size::kidSizes();
            $sizesSelect = Size::sizesSelect($sizes);
        }else{
            $sizes = Size::regularSizes();
            $sizesSelect = Size::sizesSelect($sizes);
        }

        //Filters
        $filters = $request->all();
        //Color filter
        if (isset($filters['color_id'])) {
            $productIds = DB::table('color_product')
                ->whereIn('product_id', $productIds)
                ->where('color_id', $filters['color_id'])
                ->pluck('product_id')
                ->all();
        }
        //Size filter
        if (isset($filters['size_id'])) {
            $productIds = DB::table('stocks')
                ->whereIn('product_id', $productIds)
                ->where('size_id', $filters['size_id'])
                ->pluck('product_id')
                ->all();
        }
        //Price range filter
        if (isset($filters['price']) && ($filters['price']) <> '0,5000') {
            $price = explode(',', $filters['price']);
            $price_range = '[' . $filters['price'] . ']';
            $productIds = DB::table('products')
                ->whereIn('id', $productIds)
                ->where('price','>' , $price[0])
                ->where('price','<' , $price[1])
                ->pluck('id')
                ->all();
        }

        //Second category
        if($category_id2){
            $category2 = Category::findOrFail($category_id2);
            //Shoe sizes for kids
            if($category1->id == 3 && $category2->id == 4){
                $sizes = Size::shoeSizes();
                $sizesSelect = Size::sizesSelect($sizes);
                $sizesSelect = array_where($sizesSelect, function ($value, $key) {
                    return $value < 34;
                });
            }
            //Shoe sizes for adults
            elseif($category2->id == 4){
                $sizes = Size::shoeSizes();
                $sizesSelect = Size::sizesSelect($sizes);
                $sizesSelect = array_where($sizesSelect, function ($value, $key) {
                    return $value > 34;
                });
            }
            $allProducts = $category2->products()->with('photos')->whereIn('products.id', $productIds)->paginate(20);
            return view('front.allprod', compact('category1','category2', 'allProducts', 'colorsSelect', 'sizesSelect', 'price_range'));
        }
        $allProducts = $category1->products()->with('photos')->paginate(20);
        return view('front.allprod', compact('category1', 'allProducts', 'colorsSelect', 'sizesSelect', 'price_range'));
    }

    public function about(){
        return view('front.about');
    }

    public function contact(){
        return view('front.contact');
    }

    public function addContactMsg(Request $request){
        Message::create($request->all());
        return view('front.contactsuccess');
    }

    public function search(Request $request){
        $searchterm = $request->all()['term'];
        $productsQuery = Product::where('name', 'like', "%" . $searchterm . "%");
        //Get total count for counter on search page
        $count = $productsQuery->count();
        //Get paginated results
        $products = $productsQuery->with('photos')->paginate(20)->withPath('?term=' . $searchterm);
        return view('front.search', compact('products', 'count'));
    }

    public function history(){
        $user = Auth()->user();
        //Nested eager loading
        $orders = $user->orders()->with(['stocks', 'stocks.product', 'stocks.size'])->paginate(5);
        return view('front.history', compact('user', 'orders'));
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
