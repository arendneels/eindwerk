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
        //Regular sizes
        $regularSizes = [
            'S', 'M', 'L', 'XL', 'XXL', 'One Size'
        ];

        foreach($regularSizes as $size){
            DB::table('sizes')->insert([
                'name' => $size,
                'category_id' => null,
                'created_at' => date_create(),
                'updated_at' => date_create(),
            ]);
        }

        //Shoe sizes
        $shoeSizes = [
            '26', '27', '28', '29', '30', '31', '32' ,'33', '34', '35', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45', '46', '47', '48'
        ];

        foreach($shoeSizes as $size){
            DB::table('sizes')->insert([
                'name' => $size,
                'category_id' => 4,
                'created_at' => date_create(),
                'updated_at' => date_create(),
            ]);
        }

        //Sizes for kids (units in age)
        $kidSizes = [
            '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', 'One Size'
        ];

        foreach($kidSizes as $size){
            DB::table('sizes')->insert([
                'name' => $size,
                'category_id' => 3,
                'created_at' => date_create(),
                'updated_at' => date_create(),
            ]);
        }
    }
}
