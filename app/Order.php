<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'city', 'country_id', 'address', 'address2'
    ];

    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

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
