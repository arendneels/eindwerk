<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = [
        'name', 'category_id'
    ];

    public static function regularSizes(){
        return Size::where('category_id', '=', null)->get();
    }

    public static function shoeSizes(){
        return Size::where('category_id', '=', 4)->get();
    }

    public static function kidSizes(){
        return Size::where('category_id', '=', 3)->get();
    }

    public static function sizesSelect($sizes){
        $result = [];
        foreach($sizes as $size){
            $result[$size->id] = $size->name;
        }
        return $result;
    }
}
