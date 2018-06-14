<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stocklog extends Model
{
    protected $fillable = [
        'stock_id', 'user_id', 'add', 'amount', 'type', 'order_id'
    ];

    // One to many relationship with users
    public function user(){
        return $this->belongsTo('App\User');
    }
}
