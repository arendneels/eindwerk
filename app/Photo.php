<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'name', 'tag', 'product_id'
    ];

    public function product() {
        return $this->belongsTo('\App\Product');
    }

    public function path(){
        return 'images/' . $this->name;
    }
}
