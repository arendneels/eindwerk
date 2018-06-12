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
            'name' => 'Adidas Black Shirt',
            'article_no' => '42364.12465866',
            'price' => 24.99,
            'description' => $faker->paragraph(),
            'created_at' => date_create(2017-01-01),
            'updated_at' => date_create(),
        ]);

        DB::table('products')->insert([
            'name' => 'Adidas Superstar',
            'article_no' => '424875.4568775965',
            'price' => 99.99,
            'description' => $faker->paragraph(),
            'created_at' => date_create(2017-01-01),
            'updated_at' => date_create(),
        ]);

        DB::table('products')->insert([
            'name' => 'Capel Valey Fleece Zip Hoody',
            'article_no' => '668759.4875559651',
            'price' => 89.99,
            'description' => $faker->paragraph(),
            'created_at' => date_create(2017-01-01),
            'updated_at' => date_create(),
        ]);

        DB::table('products')->insert([
            'name' => 'Dad And Son Shirt',
            'article_no' => '559758.675859621',
            'price' => 19.99,
            'description' => $faker->paragraph(),
            'created_at' => date_create(2017-01-01),
            'updated_at' => date_create(),
        ]);

        DB::table('products')->insert([
            'name' => 'Marie Music',
            'article_no' => '759758.677898428',
            'price' => 29.99,
            'description' => $faker->paragraph(),
            'created_at' => date_create(2017-01-01),
            'updated_at' => date_create(),
        ]);

        DB::table('products')->insert([
            'name' => 'Roadstar Shirt',
            'article_no' => '357584.287898496',
            'price' => 39.99,
            'description' => $faker->paragraph(),
            'created_at' => date_create(2017-01-01),
            'updated_at' => date_create(),
        ]);

        DB::table('products')->insert([
            'name' => 'Ladies Neon Tanktop',
            'article_no' => '187587.9754864253',
            'price' => 29.99,
            'description' => $faker->paragraph(),
            'created_at' => date_create(2017-01-01),
            'updated_at' => date_create(),
        ]);

        DB::table('products')->insert([
            'name' => 'Honey Bees',
            'article_no' => '546877.2646548227',
            'price' => 59.99,
            'description' => $faker->paragraph(),
            'created_at' => date_create(2017-01-01),
            'updated_at' => date_create(),
        ]);

        DB::table('products')->insert([
            'name' => 'Floral High Heels',
            'article_no' => '2654875.98456321',
            'price' => 109.99,
            'description' => $faker->paragraph(),
            'created_at' => date_create(2017-01-01),
            'updated_at' => date_create(),
        ]);

        DB::table('products')->insert([
            'name' => 'Yoshi Longsleeves',
            'article_no' => '754865.6485759512',
            'price' => 29.99,
            'description' => $faker->paragraph(),
            'created_at' => date_create(2017-01-01),
            'updated_at' => date_create(),
        ]);

        DB::table('products')->insert([
            'name' => 'Highlands\'s Apparition',
            'article_no' => '154685.6485759785',
            'price' => 49.99,
            'description' => $faker->paragraph(),
            'created_at' => date_create(2017-01-01),
            'updated_at' => date_create(),
        ]);

        DB::table('products')->insert([
            'name' => 'Vintage Shorts',
            'article_no' => '645875.2451578956',
            'price' => 59.99,
            'description' => $faker->paragraph(),
            'created_at' => date_create(2017-01-01),
            'updated_at' => date_create(),
        ]);

        DB::table('products')->insert([
            'name' => 'Floral Bloom',
            'article_no' => '540534.120146',
            'price' => 59.99,
            'description' => $faker->paragraph(),
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('products')->insert([
            'name' => $faker->word(),
            'article_no' => $faker->text(15),
            'price' => $faker->randomFloat(2,0,400),
            'description' => $faker->paragraph(),
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('products')->insert([
            'name' => $faker->word(),
            'article_no' => $faker->text(15),
            'price' => $faker->randomFloat(2,0,400),
            'description' => $faker->paragraph(),
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('products')->insert([
            'name' => $faker->word(),
            'article_no' => $faker->text(15),
            'price' => $faker->randomFloat(2,0,400),
            'description' => $faker->paragraph(),
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

    }
}
