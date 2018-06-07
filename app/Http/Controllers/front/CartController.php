<?php

namespace App\Http\Controllers\front;


use App\Country;
use App\Order;
use App\Shippingmethod;
use App\Stock;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Stripe\Charge;
use Stripe\Stripe;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        $shippingmethods = Shippingmethod::all();
        return view('front.cart', compact('countries', 'shippingmethods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
    }

    public function add($id){
        $stock = Stock::findOrFail($id);
        $product = $stock->product;
        $row = Cart::add($id, $product->name, 1, $product->price, ['size' => $stock->size->name, 'product_id' => $product->id, 'thumbnail_path' => $product->thumbnail_path(), 'article_no' => $product->article_no])->associate('App\Stock');
        if($row->qty > $stock->amount){
            Cart::update($row->rowId, $row->qty - 1);
            $errorMsg = "Insufficient stock of " . $row->name . ", please order more later";
            return view('front.cart', compact('errorMsg'));
        }
        return redirect('/cart');
    }

    public function remove($rowId){
        $currentQty = Cart::get($rowId)->qty;
        Cart::update($rowId, $currentQty - 1);
        return redirect('/cart');
    }

    public function paymentSuccess(Request $request){
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        Stripe::setApiKey("sk_test_pyvcbd3TKg8b46OuUVwJ8Q7F");

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];
        $charge = Charge::create([
            'amount' => Cart::subtotal()*100,
            'currency' => 'eur',
            'description' => 'Example charge',
            'source' => $token,
        ]);

        $input = $request->all();

        $user = Auth::user();
        $order = [];

        if(!$user && isset($_POST['checkbox_create'])){
            $input['password'] = bcrypt($input['password']);
            $user = User::create($request->all());
            Auth::login($user);
        }

        //If user is logged in, link the id to the order
        if($user) {
            $order['user_id'] = $user->id;
            $order['email'] = $user->email;
        }else{
            $order['email'] = $input['email'];
        }
        //If user is logged in and didn't chose a different shipping address
        if($user && !isset($_POST['checkbox_shipping'])) {
            $order['first_name'] = $user->first_name;
            $order['last_name'] = $user->last_name;
            $order['country_id'] = $user->country_id;
            $order['postal_code'] = $user->postal_code;
            $order['city'] = $user->city;
            $order['address'] = $user->address;
            $order['address2'] = $user->address2;
        }else{
            $order['first_name'] = $_POST['first_name'];
            $order['last_name'] = $_POST['last_name'];
            $order['country_id'] = $_POST['country_id'];
            $order['postal_code'] = $_POST['postal_code'];
            $order['city'] = $_POST['city'];
            $order['address'] = $_POST['address'];
            if(isset($_POST['address2'])){
                $order['address2'] = $_POST['address2'];
            }
        }

        $order['shippingmethod_id'] = $_POST['shippingmethod_id'];
        $order['payment_method'] = 'Credit Card';
        $order['payment_id'] = $charge->id;
        $order['subtotal'] = Cart::subtotal();
        $order['total'] = Cart::subtotal() + 10;
        $order['status'] = 'PAID';

        $order = Order::create($order);
        foreach(Cart::content() as $content){
            $order->stocks()->attach($content->id, ['price' => $content->price, 'amt' => $content->qty, 'created_at' => date_create()]);
        };

        //Destroy cart after placing order
        Cart::destroy();

        //Return successful view
        return view('front.ordersuccess');
    }
}
