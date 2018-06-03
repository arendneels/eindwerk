<?php

namespace App\Providers;

use App\Order;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.front', function ($view) {
            //Place lookbook items into sessionvariable when front layout is loaded.
            if(session('lookbook1') == null) {
                $lookbook = Product::lookbook();
                $lookbook1 = array_slice($lookbook, 0, 4);
                $lookbook2 = array_slice($lookbook, 4, 4);
                $lookbook3 = array_slice($lookbook, 8, 4);
                session(compact('lookbook1', 'lookbook2', 'lookbook3'));
            }

            //Count total category amounts and store in sessionvariable when front is loaded
            if(session('categoryCountWomen') == null){
                $categoryCountWomen = DB::table('category_product')->where('category_id', 2)->count();
                $categoryCountMen = DB::table('category_product')->where('category_id', 1)->count();
                $categoryCountKids = DB::table('category_product')->where('category_id', 3)->count();
                session(compact('categoryCountWomen', 'categoryCountMen', 'categoryCountKids'));
            }
        });

        View::composer(['back.admin', 'layouts.back'], function ($view) {
            $newOrdersCount = Order::newOrders()->count();
            $view->with('newOrdersCount', $newOrdersCount);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
