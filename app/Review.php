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

    public function user(){
        return $this->belongsTo('App\User');
    }
}
