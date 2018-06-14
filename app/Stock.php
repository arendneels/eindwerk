<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'product_id', 'size_id', 'amount'
    ];

    // One to many relationship with products
    public function product() {
        return $this->belongsTo('\App\Product');
    }

    // One to many relationship with sizes
    public function size() {
        return $this->belongsTo('\App\Size');
    }

    // One to many relationship with stocklogs
    public function stocklogs() {
        return $this->hasMany('\App\Stocklog')->orderBy('id', 'desc');
    }
}
