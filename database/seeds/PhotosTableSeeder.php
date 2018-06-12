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
            'name' => 'abs1.jpg',
            'product_id' => 1,
            'thumbnail' => true,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'abs2.jpg',
            'product_id' => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'abs3.jpg',
            'product_id' => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'as1.jpg',
            'product_id' => 2,
            'thumbnail' => true,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'as2.jpg',
            'product_id' => 2,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'fzh1.jpg',
            'product_id' => 3,
            'thumbnail' => true,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'fzh2.jpg',
            'product_id' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'fzh3.jpg',
            'product_id' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'das1.jpg',
            'product_id' => 4,
            'thumbnail' => true,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'das2.jpg',
            'product_id' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'mm1.jpg',
            'product_id' => 5,
            'thumbnail' => true,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'mm2.jpg',
            'product_id' => 5,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'mm3.jpg',
            'product_id' => 5,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'roa1.jpg',
            'product_id' => 6,
            'thumbnail' => true,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'roa2.jpg',
            'product_id' => 6,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'roa3.jpg',
            'product_id' => 6,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'lnt1.jpg',
            'product_id' => 7,
            'thumbnail' => true,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'lnt2.jpg',
            'product_id' => 7,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'hb1.jpg',
            'product_id' => 8,
            'thumbnail' => true,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'hb2.jpg',
            'product_id' => 8,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'hb3.jpg',
            'product_id' => 8,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'fhh1.jpg',
            'product_id' => 9,
            'thumbnail' => true,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'fhh2.jpg',
            'product_id' => 9,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'yls1.jpg',
            'thumbnail' => true,
            'product_id' => 10,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'yls2.jpg',
            'product_id' => 10,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'ha1.jpg',
            'thumbnail' => true,
            'product_id' => 11,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'ha2.jpg',
            'product_id' => 11,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'vs1.jpg',
            'thumbnail' => true,
            'product_id' => 12,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'vs2.jpg',
            'product_id' => 12,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('photos')->insert([
            'name' => 'vs3.jpg',
            'product_id' => 12,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);
    }
}
