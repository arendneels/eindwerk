<?php

namespace App\Http\Controllers\front;


use App\Stock;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.cart');
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
        $row = Cart::add($id, $stock->product->name, 1, $stock->product->price)->associate('App\Stock');
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
}
