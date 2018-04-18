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

    public function thumbnail(){
        return $thumbnail = $this->photos()->where('thumbnail', '=' , true)->first();
    }

    public function thumbnail_path(){
        $thumbnail = $this->photos()->where('thumbnail', '=' , true)->first();
        if($thumbnail){
            return asset('images/' . $thumbnail->name);
        }else{
            return false;
        }
    }

    public function stocks(){
        return $this->hasMany('App\Stock');
    }
}
