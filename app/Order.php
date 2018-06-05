<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'city', 'country_id', 'postal_code', 'address', 'address2', 'shipping_date', 'subtotal', 'total', 'payment_method', 'payment_id', 'status', 'user_id'
    ];

    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'shipping_date'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function country() {
        return $this->belongsTo('App\Country');
    }

    public function stocks() {
        return $this->belongsToMany('App\Stock')->withPivot('price', 'amt');
    }

    public static function newOrders(){
        return self::where('status','PAID');
    }

    public static function orderReady($id) {
       $order = self::findOrFail($id);
       //Set status + shipment date (assumed to be shipped the same day as it is approved)
       $order['status'] = 'READY FOR DELIVERY';
       $order['shipping_date'] = date_create();
       $order->update();

       //Remove products from stock + add stocklog
        foreach($order->stocks as $stock) {
            $stock['amount'] -= $stock->pivot->amt;
            $stock->update();
            Stocklog::create([
                'user_id' => Auth::user()->id,
                'add' => -$stock->pivot->amt,
                'stock_id' => $stock->id,
                'amount' => $stock->amount,
                'type' => 'Order',
                'order_id' => $order->id
            ]);
        }
       return redirect()->back();
    }


}
