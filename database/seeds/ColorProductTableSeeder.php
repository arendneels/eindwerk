<?php

use Illuminate\Database\Seeder;

class ColorProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('color_product')->insert([
            'color_id' => 1,
            'product_id' => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('color_product')->insert([
            'color_id' => 6,
            'product_id' => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('color_product')->insert([
            'color_id' => 1,
            'product_id' => 2,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('color_product')->insert([
            'color_id' => 4,
            'product_id' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);
    }
}
