<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Men',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Women',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Kids',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Shoes',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Shirts',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Pants',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Sweaters',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Dresses',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);
    }
}
