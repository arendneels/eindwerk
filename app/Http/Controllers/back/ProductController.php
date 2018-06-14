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
use Illuminate\Support\Facades\DB;
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
        $products = Product::with('photos')->get();
        return view('back.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Arrays for select fields
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
        $product = Product::with(['categories', 'colors', 'stocks', 'stocks.size'])->findOrFail($id);



        // Get data for Chart.js
        // Will be displaying the total units sold per month for each size of the product as stacked columns
        // X-axis: months, Y-axis: sum of amount of products sold, grouped per size
        // Data will be shown for last 7 months
        $timespan = 7;
        $lastMonths = [];
        $totalEarned = [];

        for($i=$timespan; $i>=0; $i--){
            array_push($lastMonths, date("M", strtotime("-" . $i ." month")));
        }

        //Get data per month
        $oldestDate = date("Y-m", strtotime("-" . $timespan ." month"));
        $i = 0;

        $datasets = [];

        //Build Custom Query
        foreach($product->stocks as $stock) {
            $dataArray = DB::table('order_stock')
                ->select(DB::raw('sum(amt) as total_amt'), DB::raw('YEAR(order_stock.created_at) year, MONTH(order_stock.created_at) month'))
                ->join('orders', 'order_stock.order_id', '=', 'orders.id')
                ->where('order_stock.created_at', '>', $oldestDate)
                ->where('status', '<>', 'CANCELLED')
                ->where('stock_id', $stock->id)
                ->groupBy('year', 'month')
                ->orderBy('year', 'asc', 'month', 'asc')
                ->get();


            $datasets[$i] = [];
            //Fill the complete array
            foreach($lastMonths as $month){
                $data = $dataArray->where('month', date('m', strtotime($month)))->first();
                if($data){
                    array_push($datasets[$i], $data->total_amt);
                }else{
                    //If month has no orders
                    array_push($datasets[$i], 0);
                }
            }

            $i += 1;
        }



        $options = [];
        $options['scales']['xAxes'][]['stacked'] = true;
        $options['scales']['yAxes'][]['stacked'] = true;
        $colorValue = 10;
        $colorValue2 = 200;
        $chart_dataset = [];
        $i = 0;

        foreach($product->stocks as $stock) {
            array_push($chart_dataset, [
                "label" => $stock->size->name,
                'backgroundColor' => "rgba($colorValue, $colorValue2, $colorValue, 0.50)",
                'borderColor' => "rgba($colorValue, $colorValue2, $colorValue, 0.7)",
                "pointBorderColor" => "rgba($colorValue, $colorValue2, $colorValue, 0.7)",
                "pointBackgroundColor" => "rgba($colorValue, $colorValue2, $colorValue, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => $datasets[$i],
            ]);
            $colorValue += 20;
            $colorValue2 -= $colorValue;
            $i += 1;
        }

        //Chart
        $chartjs = app()->chartjs
            ->name('lineChartTest')
            ->type('bar')
            ->size(['width' => 400, 'height' => 220])
            ->labels($lastMonths)
            ->datasets($chart_dataset)
            ->options($options);

        return view('back.products.show', compact('product', 'chartjs'));
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

        // Arrays for select field
        $colorsSelect = Color::colorsSelect();
        $categoriesSelect = Category::categoriesSelect();
        $regularSizes = Size::regularSizes();
        $shoeSizes = Size::shoeSizes();
        $kidSizes = Size::kidSizes();

        // Show correct select field on load
        if($product->hasShoesCategory()){
            $currentSizes = $shoeSizes;
        }elseif($product->hasKidsCategory()){
            $currentSizes = $kidSizes;
        }else {
            $currentSizes = $regularSizes;
        }

        //Put size id's already available for the product in an array
        $sizes = Stock::where('product_id', $product->id)->pluck('size_id')->all();
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
