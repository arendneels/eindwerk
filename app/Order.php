<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'city', 'country_id', 'address', 'address2'
    ];

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
       $order['status'] = 'READY FOR DELIVERY';
       $order->update();
       return redirect()->back();
    }


}
