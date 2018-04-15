<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            'name' => 'Belgium',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('countries')->insert([
            'name' => 'Germany',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('countries')->insert([
            'name' => 'USA',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('countries')->insert([
            'name' => 'Poland',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('countries')->insert([
            'name' => 'Netherlands',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('countries')->insert([
            'name' => 'France',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('countries')->insert([
            'name' => 'Sweden',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('countries')->insert([
            'name' => 'Denmark',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('countries')->insert([
            'name' => 'Spain',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('countries')->insert([
            'name' => 'Italy',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('countries')->insert([
            'name' => 'Portugal',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);
    }
}
