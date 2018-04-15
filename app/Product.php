<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'article_no', 'price'
    ];

    public function colors() {
        return $this->belongsToMany('\App\Color');
    }

    public function categories() {
        return $this->belongsToMany('\App\Category');
    }

    public function photos(){
        return $this->hasMany('\App\Photo');
    }
}
