<?php

use App\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OrderStockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_stock')->insert([
            'order_id' => 1,
            'stock_id' => 3,
            'price' => 25.55,
            'amt' => 1,
            'created_at' => Carbon::create(2017,12,10),
            'updated_at' => date_create(),
        ]);

        DB::table('order_stock')->insert([
            'order_id' => 1,
            'stock_id' => 7,
            'price' => 25.55,
            'amt' => 1,
            'created_at' => Carbon::create(2018,01,10),
            'updated_at' => date_create(),
        ]);

        DB::table('order_stock')->insert([
            'order_id' => 2,
            'stock_id' => 15,
            'price' => 230.99,
            'amt' => 1,
            'created_at' => Carbon::create(2018,03,10),
            'updated_at' => date_create(),
        ]);

        DB::table('order_stock')->insert([
            'order_id' => 2,
            'stock_id' => 20,
            'price' => 230.99,
            'amt' => 1,
            'created_at' => Carbon::create(2018,03,10),
            'updated_at' => date_create(),
        ]);

        DB::table('order_stock')->insert([
            'order_id' => 3,
            'stock_id' => 22,
            'price' => 230.99,
            'amt' => 1,
            'created_at' => Carbon::create(2018,05,10),
            'updated_at' => date_create(),
        ]);

        DB::table('order_stock')->insert([
            'order_id' => 4,
            'stock_id' => 25,
            'price' => 25.99,
            'amt' => 1,
            'created_at' => Carbon::create(2018,04,10),
            'updated_at' => date_create(),
        ]);

        DB::table('order_stock')->insert([
            'order_id' => 4,
            'stock_id' => 5,
            'price' => 25.99,
            'amt' => 1,
            'created_at' => Carbon::create(2018,02,10),
            'updated_at' => date_create(),
        ]);

        DB::table('order_stock')->insert([
            'order_id' => 5,
            'stock_id' => 35,
            'price' => 25.99,
            'amt' => 1,
            'created_at' => Carbon::create(2018,05,10),
            'updated_at' => date_create(),
        ]);

        DB::table('order_stock')->insert([
            'order_id' => 5,
            'stock_id' => 40,
            'price' => 25.99,
            'amt' => 1,
            'created_at' => Carbon::create(2018,02,10),
            'updated_at' => date_create(),
        ]);

        DB::table('order_stock')->insert([
            'order_id' => 6,
            'stock_id' => 44,
            'price' => 25.99,
            'amt' => 1,
            'created_at' => Carbon::create(2018,03,10),
            'updated_at' => date_create(),
        ]);

        DB::table('order_stock')->insert([
            'order_id' => 6,
            'stock_id' => 48,
            'price' => 25.99,
            'amt' => 1,
            'created_at' => Carbon::create(2018,04,10),
            'updated_at' => date_create(),
        ]);

        DB::table('order_stock')->insert([
            'order_id' => 6,
            'stock_id' => 52,
            'price' => 25.99,
            'amt' => 1,
            'created_at' => Carbon::create(2018,05,10),
            'updated_at' => date_create(),
        ]);
    }
}
