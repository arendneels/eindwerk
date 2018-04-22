<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name'
    ];

    public static function countriesSelect(){
        $countries = Country::all();
        $result = [];
        foreach($countries as $country){
            $result[$country->id] = $country->name;
        }
        return $result;
    }
}
