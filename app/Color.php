<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = [
        'name'
    ];

    public function products() {
        return $this->belongsToMany('\App\Product');
    }


    //Function retrieves an array which is set up to fit into HTML select elements inside forms
    public static function colorsSelect(){
        $colors = Color::all();
        $result = [];
        foreach($colors as $color){
            $result[$color->id] = $color->name;
        }
        return $result;
    }
}
