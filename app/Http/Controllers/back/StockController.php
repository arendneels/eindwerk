<?php

namespace App\Http\Controllers\back;

use App\Stock;
use App\Stocklog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::with('product', 'size')->get();
        return view('back.stocks.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stocks = Stock::with('product', 'size')->get();
        return view('back.stocks.add', compact('stocks'));
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

    //Display Stocklog for individual stock (limit to last 50 entries)
    public function show($id)
    {
        $stock = Stock::findOrFail($id);
        $stocklogs = $stock->stocklogs()->limit(50)->get();
        return view('back.stocks.show', compact('stock', 'stocklogs'));
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
        //Update stock
        $this->validate($request, [
            'add' => 'required',
        ]);
        $stock = Stock::findOrFail($id);
        $input = $request->all();
        $stock->amount = $stock->amount + $input['add'];
        $stock->update();
        //Make Stocklog entry with new amount
        $stocklog['add'] = $input['add'];
        $stocklog['user_id'] = Auth::user()->id;
        $stocklog['stock_id'] = $stock->id;
        $stocklog['amount'] = $stock->amount;
        $stocklog['type'] = 'Add to stock';
        Stocklog::create($stocklog);
        //Return response
        return response()->json($stock);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
