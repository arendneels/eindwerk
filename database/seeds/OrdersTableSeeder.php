<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'user_id' => 1,
            'subtotal' => 340.25,
            'payment_method' => 'PayPal',
            'payment_id' => 'Jljdkfmsha5466fd5q52',
            'address' => "Mijn adres",
            'city' => "Eernegem",
            'postal_code' => "8480",
            'country_id' => 1,
            'total' => 350.25,
            'status' => 'PAID',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('orders')->insert([
            'user_id' => 1,
            'subtotal' => 230.99,
            'payment_method' => 'PayPal',
            'payment_id' => 'JLjkjqgfa5466fd5q52',
            'address' => "Mijn adres",
            'city' => "Eernegem",
            'postal_code' => "8480",
            'country_id' => 1,
            'total' => 240.99,
            'status' => 'DELIVERED',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);
    }
}
