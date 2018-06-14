<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_id', 'user_id', 'title', 'body', 'rating', 'valdiated'
    ];

    // One to many relationship with users
    public function user(){
        return $this->belongsTo('App\User');
    }

    // One to many relationship with products
    public function product(){
        return $this->belongsTo('App\Product');
    }
}
