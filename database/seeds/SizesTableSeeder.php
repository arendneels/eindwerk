<?php

use Illuminate\Database\Seeder;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert([
            'name' => "S",
            'category_id' => null,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "M",
            'category_id' => null,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "L",
            'category_id' => null,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "XL",
            'category_id' => null,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "XXL",
            'category_id' => null,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "One Size",
            'category_id' => null,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        //Shoe sizes
        DB::table('sizes')->insert([
            'name' => "26",
            'category_id' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "27",
            'category_id' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "28",
            'category_id' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "29",
            'category_id' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "30",
            'category_id' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "31",
            'category_id' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "32",
            'category_id' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "33",
            'category_id' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "34",
            'category_id' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "35",
            'category_id' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "36",
            'category_id' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "37",
            'category_id' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "38",
            'category_id' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "39",
            'category_id' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "40",
            'category_id' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "41",
            'category_id' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "42",
            'category_id' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "43",
            'category_id' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "44",
            'category_id' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "45",
            'category_id' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "46",
            'category_id' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "47",
            'category_id' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "48",
            'category_id' => 4,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        //Sizes for kids (units in age)
        DB::table('sizes')->insert([
            'name' => "3",
            'category_id' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "4",
            'category_id' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "5",
            'category_id' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "6",
            'category_id' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "7",
            'category_id' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "8",
            'category_id' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "9",
            'category_id' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "10",
            'category_id' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "11",
            'category_id' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "12",
            'category_id' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "13",
            'category_id' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('sizes')->insert([
            'name' => "One Size",
            'category_id' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);
    }
}
