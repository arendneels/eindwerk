<?php

use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
            'name' => 'Black',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('colors')->insert([
            'name' => 'Blue',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('colors')->insert([
            'name' => 'Red',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('colors')->insert([
            'name' => 'Green',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('colors')->insert([
            'name' => 'Yellow',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('colors')->insert([
            'name' => 'Pink',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('colors')->insert([
            'name' => 'Orange',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('colors')->insert([
            'name' => 'Purple',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('colors')->insert([
            'name' => 'White',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);
    }
}
