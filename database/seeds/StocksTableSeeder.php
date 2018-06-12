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
            'size_id' => 2,
            'amount' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 1,
            'size_id' => 3,
            'amount' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 1,
            'size_id' => 4,
            'amount' => 0,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 1,
            'size_id' => 5,
            'amount' => 6,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 1,
            'size_id' => 6,
            'amount' => 2,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 2,
            'size_id' => 24,
            'amount' => 2,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 2,
            'size_id' => 25,
            'amount' => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 2,
            'size_id' => 26,
            'amount' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 2,
            'size_id' => 27,
            'amount' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 2,
            'size_id' => 28,
            'amount' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 2,
            'size_id' => 29,
            'amount' => 3,
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
            'product_id' => 2,
            'size_id' => 31,
            'amount' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 3,
            'size_id' => 2,
            'amount' => 2,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 3,
            'size_id' => 3,
            'amount' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 3,
            'size_id' => 4,
            'amount' => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 3,
            'size_id' => 5,
            'amount' => 0,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 3,
            'size_id' => 6,
            'amount' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 4,
            'size_id' => 37,
            'amount' => 2,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 4,
            'size_id' => 38,
            'amount' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 5,
            'size_id' => 2,
            'amount' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 5,
            'size_id' => 3,
            'amount' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 5,
            'size_id' => 4,
            'amount' => 2,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 5,
            'size_id' => 5,
            'amount' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 6,
            'size_id' => 2,
            'amount' => 0,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 6,
            'size_id' => 3,
            'amount' => 5,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 6,
            'size_id' => 4,
            'amount' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 6,
            'size_id' => 5,
            'amount' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 6,
            'size_id' => 6,
            'amount' => 2,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 7,
            'size_id' => 2,
            'amount' => 2,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 7,
            'size_id' => 3,
            'amount' => 5,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 7,
            'size_id' => 4,
            'amount' => 2,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 7,
            'size_id' => 5,
            'amount' => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 8,
            'size_id' => 2,
            'amount' => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 8,
            'size_id' => 3,
            'amount' => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 8,
            'size_id' => 4,
            'amount' => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 8,
            'size_id' => 5,
            'amount' => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 9,
            'size_id' => 23,
            'amount' => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 9,
            'size_id' => 24,
            'amount' => 0,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 9,
            'size_id' => 25,
            'amount' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 9,
            'size_id' => 26,
            'amount' => 2,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 9,
            'size_id' => 27,
            'amount' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 10,
            'size_id' => 40,
            'amount' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 10,
            'size_id' => 41,
            'amount' => 2,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 10,
            'size_id' => 42,
            'amount' => 2,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 10,
            'size_id' => 43,
            'amount' => 2,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 11,
            'size_id' => 2,
            'amount' => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 11,
            'size_id' => 3,
            'amount' => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 11,
            'size_id' => 4,
            'amount' => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 11,
            'size_id' => 5,
            'amount' => 2,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 12,
            'size_id' => 2,
            'amount' => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 12,
            'size_id' => 3,
            'amount' => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 12,
            'size_id' => 4,
            'amount' => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 12,
            'size_id' => 5,
            'amount' => 2,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('stocks')->insert([
            'product_id' => 12,
            'size_id' => 6,
            'amount' => 2,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);
    }
}
