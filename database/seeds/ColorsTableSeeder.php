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
        $colors = [
            'Black',
            'White',
            'Gray',
            'Red',
            'Blue',
            'Green',
            'Yellow',
            'Orange',
            'Pink',
            'Purple',
            'Brown'
        ];

        foreach($colors as $color){
            DB::table('colors')->insert([
                'name' => $color,
                'created_at' => date_create(),
                'updated_at' => date_create(),
            ]);
        }
    }
}
