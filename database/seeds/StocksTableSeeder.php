<?php

use Illuminate\Database\Seeder;

class StocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stocks')->insert([
            'product_id' => 1,
            'size_id' => 1,
            'amount' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 1,
            'size_id' => 2,
            'amount' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 1,
            'size_id' => 3,
            'amount' => 0,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 1,
            'size_id' => 4,
            'amount' => 6,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 2,
            'size_id' => 28,
            'amount' => 2,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 2,
            'size_id' => 29,
            'amount' => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 2,
            'size_id' => 30,
            'amount' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 3,
            'size_id' => 35,
            'amount' => 2,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 3,
            'size_id' => 36,
            'amount' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);
    }
}
