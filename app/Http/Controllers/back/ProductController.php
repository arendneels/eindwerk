<?php

namespace App\Http\Controllers\back;

use App\Category;
use App\Color;
use App\Photo;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('back.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colorsSelect = Color::colorsSelect();
        $categoriesSelect = Category::categoriesSelect();
        return view('back.products.create', compact('colorsSelect', 'categoriesSelect'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Create new product
        $input = $request->all();
        $product = Product::create($input);

        //Sync many to many relationship with Categories
        $categoryArray = [];
        for($i = 1; $i<=$input['categories_amt']; $i++){
            $categoryArray[$i] = $input['category_id' . $i];
        }
        $product->categories()->sync($categoryArray);

        //Sync many to many relationship with Colors
        $colorArray = [];
        for($i = 1; $i<=$input['colors_amt']; $i++){
            $colorArray[$i] = $input['color_id' . $i];
        }
        $product->colors()->sync($colorArray);

        //Create Uploaded images in photos database and link with current product
        $imageArray = [];
        for($i = 1; $i<=$input['images_amt']; $i++){
            //Make first uploaded image thumbnail by default
            if($i == 1){
                $imageArray[$i] = ['name' => $input['photo_name'. $i], 'thumbnail' => true];
            }else{
                $imageArray[$i] = ['name' => $input['photo_name'. $i]];
            }
        }
        $product->photos()->createMany($imageArray);

        return redirect('/admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $colorsSelect = Color::colorsSelect();
        $categoriesSelect = Category::categoriesSelect();
        return view('back.products.edit', compact('product', 'colorsSelect', 'categoriesSelect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //Update product
        $input = $request->all();
        $product = Product::findOrFail($id);
        $product->update($input);

        //Sync many to many relationship with Categories
        $categoryArray = [];
        for($i = 1; $i<=$input['categories_amt']; $i++){
            $categoryArray[$i] = $input['category_id' . $i];
        }
        $product->categories()->sync($categoryArray);

        //Sync many to many relationship with Colors
        $colorArray = [];
        for($i = 1; $i<=$input['colors_amt']; $i++){
            $colorArray[$i] = $input['color_id' . $i];
        }
        $product->colors()->sync($colorArray);

        //Create Uploaded images in photos database and link with current product
        $imageArray = [];
        for($i = 1; $i<=$input['images_amt']; $i++){
            $imageArray[$i] = ['name' => $input['photo_name'. $i]];
        }
        $product->photos()->createMany($imageArray);

        //Remove old thumbnail and add new if selected thumbnail is different
        $currentThumbnail = $product->thumbnail();
        if($currentThumbnail->id <> $input['thumbnail']){

            $currentThumbnail->thumbnail = false;
            $currentThumbnail->update();

            $newThumbnail = Photo::findOrFail($input['thumbnail']);
            $newThumbnail->thumbnail = true;
            $newThumbnail->update();
        }

        //Delete checked images form images file and database
        if(isset($input['delete'])){
            foreach($input['delete'] as $photo_id){
                $photo = Photo::findOrFail($photo_id);
                File::delete(public_path(). '\\images\\'.$photo->name);
                $photo->delete();
            }
        }

        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
