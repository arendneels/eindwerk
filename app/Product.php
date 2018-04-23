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


    public function photos(){
        //Always return the thumbnail as first photo in the array
        return $this->hasMany('\App\Photo')->orderBy('thumbnail', 'desc');
    }

    public function thumbnail(){
        if($this->photos->count() > 0) {
            $thumbnail = $this->photos()->where('thumbnail', '=', true)->first();
            if(isset($thumbnail)){
                return $thumbnail;
            }else{
                return $this->photos()->first();
            }
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
}
