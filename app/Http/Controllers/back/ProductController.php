<?php

namespace App\Http\Controllers\back;

use App\Category;
use App\Color;
use App\Http\Requests\ProductRequest;
use App\Photo;
use App\Product;
use App\Size;
use App\Stock;
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
        $regularSizes = Size::regularSizes();
        $shoeSizes = Size::shoeSizes();
        $kidSizes = Size::kidSizes();
        return view('back.products.create', compact('colorsSelect', 'categoriesSelect', 'regularSizes', 'shoeSizes', 'kidSizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
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

        //Create size relationships via stock (default stock amount = 0)
        foreach($input['sizes'] as $size_id){
            $stock = ['product_id' => $product->id, 'size_id' => $size_id];
            Stock::create($stock);
        }

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
        $regularSizes = Size::regularSizes();
        $shoeSizes = Size::shoeSizes();
        $kidSizes = Size::kidSizes();
        if($product->hasShoesCategory()){
            $currentSizes = $shoeSizes;
        }elseif($product->hasKidsCategory()){
            $currentSizes = $kidSizes;
        }else {
            $currentSizes = $regularSizes;
        }
        $stocks = Stock::where('product_id', $product->id)->get();
        $sizes = [];
        foreach($stocks as $stock){
            array_push($sizes, $stock->size_id);
        }
        return view('back.products.edit', compact('product', 'colorsSelect', 'categoriesSelect', 'regularSizes', 'shoeSizes', 'kidSizes' ,'currentSizes', 'sizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
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
            //Make first uploaded image thumbnail by default
            if($product->photos->count() == 0 && $i == 1){
                $imageArray[$i] = ['name' => $input['photo_name'. $i], 'thumbnail' => true];
            }else{
                $imageArray[$i] = ['name' => $input['photo_name'. $i]];
            }
        }
        $product->photos()->createMany($imageArray);

        //Remove old thumbnail and add new if selected thumbnail is different
        $currentThumbnail = $product->thumbnail();
        if($currentThumbnail && isset($input['thumbnail'])) {
            if ($currentThumbnail->id <> $input['thumbnail']) {

                $currentThumbnail->thumbnail = false;
                $currentThumbnail->update();

                $newThumbnail = Photo::findOrFail($input['thumbnail']);
                $newThumbnail->thumbnail = true;
                $newThumbnail->update();
            }
        }

        //Delete checked images form images file and database
        if(isset($input['delete'])){
            foreach($input['delete'] as $photo_id){
                $photo = Photo::findOrFail($photo_id);
                File::delete(public_path(). '\\images\\'.$photo->name);
                $photo->delete();
            }
        }

        //Sizes
        $stocks = $product->stocks;
        $deletedStocks = Stock::onlyTrashed()->where('product_id', $product->id)->get();
        $sizes = [];
        $deletedSizes = [];
        foreach($stocks as $stock){
            array_push($sizes, $stock->size_id);
        }
        foreach($deletedStocks as $deletedStock){
            array_push($deletedSizes, $deletedStock->size_id);
        }

        //Create size relationships via stock
        if(isset($input['sizes'])) {
            foreach ($input['sizes'] as $size_id) {
                if (in_array($size_id, $deletedSizes)) {
                    Stock::onlyTrashed()->where([
                        ['product_id', '=', $product->id],
                        ['size_id', '=', $size_id]
                    ])->restore();
                    array_push($sizes, $size_id);
                }
                if (!in_array($size_id, $sizes)) {
                    $stock = ['product_id' => $product->id, 'size_id' => $size_id];
                    Stock::create($stock);
                }
            }
        }

        //Soft delete unchecked relationships for stocks(sizes)
        if(isset($input['sizes'])){
            $inputSizes = $input['sizes'];
        }else{
            $inputSizes = [];
        }
        foreach($stocks as $stock){
            if(!in_array($stock->size_id, $inputSizes)){
                Stock::findOrFail($stock->id)->delete();
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
        $product = Product::findOrFail($id);
        //Delete Colors relationship
        $product->colors()->detach();
        //Delete Categories relationship
        $product->categories()->detach();
        //Delete Images from images file
        foreach($product->photos as $photo){
            File::delete(public_path(). '\\images\\'.$photo->name);
        }
        //Delete images from database
        $product->photos()->delete();
        //Soft delete stocks
        $product->stocks()->delete();
        //Soft delete product
        $product->delete();
        return redirect()->back();
    }
}
