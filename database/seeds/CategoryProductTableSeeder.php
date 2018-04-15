<?php

use Illuminate\Database\Seeder;

class CategoryProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_product')->insert([
            'category_id' => 1,
            'product_id' => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('category_product')->insert([
            'category_id' => 6,
            'product_id' => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('category_product')->insert([
            'category_id' => 2,
            'product_id' => 2,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('category_product')->insert([
            'category_id' => 5,
            'product_id' => 2,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);
    }
}
