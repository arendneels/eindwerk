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
            'category_id' => 5,
            'product_id' => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('category_product')->insert([
            'category_id' => 1,
            'product_id' => 2,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('category_product')->insert([
            'category_id' => 4,
            'product_id' => 2,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('category_product')->insert([
            'category_id' => 1,
            'product_id' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('category_product')->insert([
            'category_id' => 8,
            'product_id' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('category_product')->insert([
            'category_id' => 3,
            'product_id' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('category_product')->insert([
            'category_id' => 5,
            'product_id' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('category_product')->insert([
            'category_id' => 2,
            'product_id' => 5,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('category_product')->insert([
            'category_id' => 5,
            'product_id' => 5,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('category_product')->insert([
            'category_id' => 1,
            'product_id' => 6,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('category_product')->insert([
            'category_id' => 5,
            'product_id' => 6,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('category_product')->insert([
            'category_id' => 2,
            'product_id' => 7,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('category_product')->insert([
            'category_id' => 10,
            'product_id' => 7,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('category_product')->insert([
            'category_id' => 2,
            'product_id' => 8,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('category_product')->insert([
            'category_id' => 11,
            'product_id' => 8,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('category_product')->insert([
            'category_id' => 2,
            'product_id' => 9,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('category_product')->insert([
            'category_id' => 4,
            'product_id' => 9,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('category_product')->insert([
            'category_id' => 3,
            'product_id' => 10,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('category_product')->insert([
            'category_id' => 8,
            'product_id' => 10,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('category_product')->insert([
            'category_id' => 2,
            'product_id' => 11,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('category_product')->insert([
            'category_id' => 12,
            'product_id' => 11,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('category_product')->insert([
            'category_id' => 1,
            'product_id' => 12,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('category_product')->insert([
            'category_id' => 7,
            'product_id' => 12,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);
    }
}
