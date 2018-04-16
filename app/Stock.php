<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'product_id', 'size_id', 'amount'
    ];

    public function product() {
        return $this->belongsTo('\App\Product');
    }

    public function size() {
        return $this->belongsTo('\App\Size');
    }
}
