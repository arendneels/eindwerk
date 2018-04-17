<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photos')->insert([
            'name' => 'image1.png',
            'product_id' => 1,
            'thumbnail' => true,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'image2.png',
            'product_id' => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'image3.png',
            'product_id' => 2,
            'thumbnail' => true,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'image4.png',
            'product_id' => 2,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);
    }
}
