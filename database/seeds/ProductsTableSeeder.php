<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('products')->insert([
            'name' => 'Floral Bloom',
            'article_no' => '540534.120146',
            'price' => 59.99,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('products')->insert([
            'name' => $faker->word(),
            'article_no' => $faker->text(15),
            'price' => $faker->randomFloat(2,0,400),
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('products')->insert([
            'name' => $faker->word(),
            'article_no' => $faker->text(15),
            'price' => $faker->randomFloat(2,0,400),
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('products')->insert([
            'name' => $faker->word(),
            'article_no' => $faker->text(15),
            'price' => $faker->randomFloat(2,0,400),
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);
    }
}
