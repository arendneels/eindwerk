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
        $countries = [
            'Belgium',
            'Netherlands',
            'France',
            'Germany',
            'Spain',
            'Italy',
            'Portugal',
            'Sweden',
            'Denmark',
            'Poland'
        ];

        foreach($countries as $country){
            DB::table('countries')->insert([
                'name' => $country,
                'created_at' => date_create(),
                'updated_at' => date_create(),
            ]);
        }
    }
}
