<?php

namespace App\Http\Controllers\back;

use App\Order;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('country')->get();
        return view('back.orders.index', compact('orders'));
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
        $order = Order::findOrFail($id);
        return view('back.orders.show', compact('order', 'client'));
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
    // Order is cancelled
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'CANCELLED';
        $order->update();

        //Products are added to stock again
        //Remove order from stock
        foreach($order->stocks as $stock) {
            $stock['amount'] += $stock->pivot->amt;
            $stock->update();
            $stocklog = [
                'add' => $stock->pivot->amt,
                'stock_id' => $stock->id,
                'amount' => $stock->amount,
                'type' => 'Order Cancelled',
                'order_id' => $order->id,
                //User linked with stocklog is backend user who cancelled the order
                'user_id' => Auth::user()->id
            ];
            //Create a stocklog for the order cancel
            Stocklog::create($stocklog);
        }

        return redirect('admin/orders');
    }


    public function newOrders()
    {
        // New orders have status 'PAID'
        $orders = Order::where('status', 'PAID')->with('country')->get();
        return view('back.orders.index', compact('orders'));
    }


    public function orderReady($id)
    {
        Order::orderReady($id);
        return redirect()->back();
    }

    public function orderDelivered($id)
    {
        Order::orderDelivered($id);
        return redirect()->back();
    }
}
