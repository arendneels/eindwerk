<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'article_no', 'price', 'description'
    ];

    public function colors() {
        return $this->belongsToMany('\App\Color');
    }

    public function categories() {
        return $this->belongsToMany('\App\Category');
    }

    public function reviews(){
        //Always return the thumbnail as first photo in the array
        return $this->hasMany('\App\Review')->where('validated', true)->orderBy('created_at', 'desc');
    }

    public function allreviews(){
        //Always return the thumbnail as first photo in the array
        return $this->hasMany('\App\Review')->orderBy('created_at', 'desc');
    }

    public function photos(){
        //Always return the thumbnail as first photo in the array
        return $this->hasMany('\App\Photo')->orderBy('thumbnail', 'desc');
    }

    public function thumbnail(){
        $photos = $this->photos;
        if($photos->count() > 0) {
            //Return first photo (query places thumbnail first, otherwise first picture will be taken as thumbnail)
            return $photos->first();
        }else{
            return false;
        }
    }

    public function thumbnail_path(){
        $thumbnail = $this->thumbnail();
        if ($thumbnail) {
            return asset('images/' . $thumbnail->name);
        } else {
            return asset('images/no-image.jpg');
        }
    }

    public function stocks(){
        return $this->hasMany('App\Stock');
    }

    public function hasShoesCategory(){
        foreach($this->categories as $category){
            if($category->id == 4){
                return true;
            }
        }
        return false;
    }

    public function hasKidsCategory(){
        foreach($this->categories as $category){
            if($category->id == 3){
                return true;
            }
        }
        return false;
    }

    public function sizeUnits(){
        if($this->hasShoesCategory()){
            return '(EU Shoe Size)';
        }elseif($this->hasKidsCategory()){
            return '(Age)';
        }else{
            return false;
        }
    }

    public function hasSizesOutOfStock(){
        $amt_array = $this->stocks()->pluck('amount')->all();
        if(in_array(0, $amt_array)){
            return true;
        }else{
            return false;
        }
    }

    //Function returns an array of 12 products for the lookbook (12 newest items added)
    public static function lookbook(){
        return self::orderBy('created_at', 'desc')->limit(12)->with('photos')->get()->all();
    }
}
