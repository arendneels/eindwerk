<?php

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
            'stock_id' => 2,
            'price' => 25.55,
            'amt' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('order_stock')->insert([
            'order_id' => 1,
            'stock_id' => 4,
            'price' => 250.55,
            'amt' => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('order_stock')->insert([
            'order_id' => 2,
            'stock_id' => 3,
            'price' => 230.99,
            'amt' => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);
    }
}
