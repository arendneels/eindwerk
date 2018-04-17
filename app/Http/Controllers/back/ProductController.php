<?php

namespace App\Http\Controllers\back;

use App\Category;
use App\Color;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('back.products.edit', compact('product', 'colorsSelect'));
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
        //
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
