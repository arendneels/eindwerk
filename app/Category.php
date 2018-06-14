<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name'
    ];

    // Many to many relationship with products
    public function products() {
        return $this->belongsToMany('\App\Product');
    }

    // Return an array with the category id as key and category name as value for select fields
    public static function categoriesSelect(){
        $categories = Category::all();
        $result = [];
        foreach($categories as $category){
            $result[$category->id] = $category->name;
        }
        return $result;
    }
}
