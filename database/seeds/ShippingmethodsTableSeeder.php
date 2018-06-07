<?php

use Illuminate\Database\Seeder;

class ShippingmethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shippingmethods')->insert([
            'name' => 'UPS',
            'price' => 8.50,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('shippingmethods')->insert([
            'name' => 'DHL',
            'price' => 10.50,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);
    }
}
