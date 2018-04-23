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
        $categories = [
            'Men',
            'Women',
            'Kids',
            'Shoes',
            'Shirts',
            'Band Shirts',
            'Pants',
            'Sweaters',
            'Jackets',
            'Tops',
            'Dresses',
            'Skirts',
            'Hats',
            'Underwear',
            'Accessories',
        ];

        foreach($categories as $category){
            DB::table('categories')->insert([
                'name' => $category,
                'created_at' => date_create(),
                'updated_at' => date_create(),
            ]);
        }
    }
}
