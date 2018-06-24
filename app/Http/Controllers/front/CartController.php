<?php

namespace App\Http\Controllers\front;


use App\Country;
use App\Http\Requests\front\OrderRequest;
use App\Order;
use App\Shippingmethod;
use App\Stock;
use App\Stocklog;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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

    // Remove entire row from the cart
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
    }

    // Add single item to the cart. Stock id used as row id for cart.
    public function add($id){
        $stock = Stock::findOrFail($id);
        $product = $stock->product;
        $row = Cart::add($id, $product->name, 1, $product->price, ['size' => $stock->size->name, 'product_id' => $product->id, 'thumbnail_path' => $product->thumbnail_path(), 'article_no' => $product->article_no])->associate('App\Stock');
        //Prevent client from adding a higher quantity of the product to his cart than the current stock
        if($row->qty > $stock->amount){
            Cart::update($row->rowId, $row->qty - 1);
            Session::flash('stockError', 'Insufficient stock of ' . $row->name . ' size ' . $row->options->size . ', please order more later');
        }
        return redirect('/cart');
    }

    // Remove 1 item from the cart
    public function remove($rowId){
        $currentQty = Cart::get($rowId)->qty;
        Cart::update($rowId, $currentQty - 1);
        return redirect('/cart');
    }

    public function paymentSuccess(OrderRequest $request){

        //Final check if stock is sufficient, if stock is insufficient the user will be redirected with the message that there is insufficient stock and the quantity in his cart adjusted
        foreach(Cart::content() as $row){
            $stock = Stock::findOrFail($row->id);
            if($row->qty > $stock->amount){
                Cart::update($row->id, $stock->amount);
                Session::flash('stockError', ' Insufficient stock of ' . $row->name . ' size' . $row->options->size . ', quanity was adjusted, please verify');
                return redirect('cart');
            }
        }


        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        Stripe::setApiKey(env('STRIPE_SECRET'));

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

        // If user isn't logged in, but wants to create a new account, bcrypt the password field and create the user
        if(!$user && isset($_POST['checkbox_create'])){
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            Auth::login($user);
        }

        // If user is logged in, link the id to the order
        if($user) {
            $order['user_id'] = $user->id;
            $order['email'] = $user->email;
        }else{
            $order['email'] = $input['email'];
        }
        // If user is logged in and didn't chose a different shipping address, get data from user
        if($user && !isset($_POST['checkbox_shipping'])) {
            $order['first_name'] = $user->first_name;
            $order['last_name'] = $user->last_name;
            $order['country_id'] = $user->country_id;
            $order['postal_code'] = $user->postal_code;
            $order['city'] = $user->city;
            $order['address'] = $user->address;
            $order['address2'] = $user->address2;
        }
        // Else fill the order object with input fields
        else{
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
        $order['shipping_cost'] = Shippingmethod::findOrFail($_POST['shippingmethod_id'])->price;
        // Currently only single payment method
        $order['payment_method'] = 'Credit Card';
        // Payment_id contains the stripe charge id for reference
        $order['payment_id'] = $charge->id;
        $order['subtotal'] = Cart::subtotal();
        //Total equals cost of products + shipping cost
        $order['total'] = Cart::subtotal() + $order['shipping_cost'];
        //Stripe cost calculation
        $order['payment_cost'] = $order['total'] * 0.014 + 0.25;

        $order['status'] = 'PAID';
        $order['created_at_ip'] = request()->ip();

        $order = Order::create($order);
        // Link the products (as stocks to include size) sold with the order
        foreach(Cart::content() as $content){
            $order->stocks()->attach($content->id, ['price' => $content->price, 'amt' => $content->qty, 'created_at' => date_create()]);
        };

        //Remove order from stock
        foreach($order->stocks as $stock) {
            $stock['amount'] -= $stock->pivot->amt;
            $stock->update();
            $stocklog = [
                'add' => -$stock->pivot->amt,
                'stock_id' => $stock->id,
                'amount' => $stock->amount,
                'type' => 'Order',
                'order_id' => $order->id
            ];
            if($user){
                $stocklog['user_id'] = $user->id;
            }
            //Create a stocklog for the order
            Stocklog::create($stocklog);
        }

        //Destroy cart after placing order
        Cart::destroy();

        //Return 'order successful' view
        return view('front.ordersuccess');
    }
}
