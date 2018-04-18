<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'name', 'product_id', 'thumbnail'
    ];

    public function product() {
        return $this->belongsTo('\App\Product');
    }

    public function path(){
        return asset('images/' . $this->name);
    }
}
