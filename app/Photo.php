<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'name', 'product_id', 'thumbnail'
    ];

    // One to many relationship with products
    public function product() {
        return $this->belongsTo('\App\Product');
    }

    // Returns the image path as a string
    public function path(){
        return asset('images/' . $this->name);
    }
}
