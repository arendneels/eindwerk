<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shippingmethod extends Model
{
    protected $fillable = [
        'name', 'price'
    ];
}
