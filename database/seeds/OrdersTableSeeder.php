<?php

use Carbon\Carbon;
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
            'first_name' => 'Arend',
            'last_name' => 'Neels',
            'email' => 'arendneels@hotmail.com',
            'subtotal' => 340.25,
            'payment_method' => 'PayPal',
            'payment_id' => 'Jljdkfmsha5466fd5q52',
            'address' => "Mijn adres",
            'city' => "Eernegem",
            'postal_code' => "8480",
            'country_id' => 1,
            'total' => 350.25,
            'status' => 'PAID',
            'shippingmethod_id' => 1,
            'payment_cost' => 2.30,
            'shipping_cost' => 8.50,
            'shipping_date' => null,
            'created_at_ip' => 'TESTIP',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('orders')->insert([
            'user_id' => 1,
            'first_name' => 'Arend',
            'last_name' => 'Neels',
            'email' => 'arendneels@hotmail.com',
            'subtotal' => 230.99,
            'payment_method' => 'PayPal',
            'payment_id' => 'JLjkjqgfa5466fd5q52',
            'address' => "Mijn adres",
            'city' => "Eernegem",
            'postal_code' => "8480",
            'country_id' => 1,
            'total' => 240.99,
            'status' => 'DELIVERED',
            'shippingmethod_id' => 2,
            'payment_cost' => 2.30,
            'shipping_cost' => 8.50,
            'shipping_date' =>  date_create(),
            'created_at_ip' => 'TESTIP',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('orders')->insert([
            'user_id' => 3,
            'first_name' => 'Client1',
            'last_name' => 'Hazy',
            'email' => 'hazyclient1@hotmail.com',
            'subtotal' => 129.99,
            'payment_method' => 'PayPal',
            'payment_id' => 'JLjkjqgfa5466fd5q52',
            'address' => "Mijn adres",
            'city' => "Eernegem",
            'postal_code' => "8480",
            'country_id' => 1,
            'total' => 139.99,
            'status' => 'DELIVERED',
            'shippingmethod_id' => 2,
            'payment_cost' => 2.30,
            'shipping_cost' => 8.50,
            'shipping_date' =>  date_create(),
            'created_at_ip' => 'TESTIP',
            'created_at' => Carbon::create(2017,12,10),
            'updated_at' => date_create(),
        ]);

        DB::table('orders')->insert([
            'user_id' => 3,
            'first_name' => 'Client1',
            'last_name' => 'Hazy',
            'email' => 'hazyclient1@hotmail.com',
            'subtotal' => 230.99,
            'payment_method' => 'PayPal',
            'payment_id' => 'JLjkjqgfa5466fd5q52',
            'address' => "Mijn adres",
            'city' => "Eernegem",
            'postal_code' => "8480",
            'country_id' => 1,
            'total' => 240.99,
            'status' => 'DELIVERED',
            'shippingmethod_id' => 2,
            'payment_cost' => 2.30,
            'shipping_cost' => 8.50,
            'shipping_date' =>  date_create(),
            'created_at_ip' => 'TESTIP',
            'created_at' => Carbon::create(2018,1,10),
            'updated_at' => date_create(),
        ]);

        DB::table('orders')->insert([
            'user_id' => 2,
            'first_name' => 'Client1',
            'last_name' => 'Hazy',
            'email' => 'hazyclient1@hotmail.com',
            'subtotal' => 129.98,
            'payment_method' => 'PayPal',
            'payment_id' => 'JLjkjqgfa5466fd5q52',
            'address' => "Mijn adres",
            'city' => "Eernegem",
            'postal_code' => "8480",
            'country_id' => 1,
            'total' => 139.98,
            'status' => 'DELIVERED',
            'shippingmethod_id' => 2,
            'payment_cost' => 2.30,
            'shipping_cost' => 10.50,
            'shipping_date' =>  date_create(),
            'created_at_ip' => 'TESTIP',
            'created_at' => Carbon::create(2018,1,19),
            'updated_at' => date_create(),
        ]);

        DB::table('orders')->insert([
            'user_id' => 3,
            'first_name' => 'Client1',
            'last_name' => 'Hazy',
            'email' => 'hazyclient1@hotmail.com',
            'subtotal' => 159.98,
            'payment_method' => 'PayPal',
            'payment_id' => 'JLjkjqgfa5466fd5q52',
            'address' => "Mijn adres",
            'city' => "Eernegem",
            'postal_code' => "8480",
            'country_id' => 1,
            'total' => 169.98,
            'status' => 'DELIVERED',
            'shippingmethod_id' => 2,
            'payment_cost' => 2.30,
            'shipping_cost' => 10.50,
            'shipping_date' =>  date_create(),
            'created_at_ip' => 'TESTIP',
            'created_at' => Carbon::create(2018,2,19),
            'updated_at' => date_create(),
        ]);

        DB::table('orders')->insert([
            'user_id' => 3,
            'first_name' => 'Client1',
            'last_name' => 'Hazy',
            'email' => 'hazyclient1@hotmail.com',
            'subtotal' => 78.98,
            'payment_method' => 'PayPal',
            'payment_id' => 'JLjkjqgfa5466fd5q52',
            'address' => "Mijn adres",
            'city' => "Eernegem",
            'postal_code' => "8480",
            'country_id' => 1,
            'total' => 88.98,
            'status' => 'DELIVERED',
            'shippingmethod_id' => 2,
            'payment_cost' => 2.30,
            'shipping_cost' => 10.50,
            'shipping_date' =>  date_create(),
            'created_at_ip' => 'TESTIP',
            'created_at' => Carbon::create(2018,4,19),
            'updated_at' => date_create(),
        ]);

        DB::table('orders')->insert([
            'user_id' => 3,
            'first_name' => 'Client1',
            'last_name' => 'Hazy',
            'email' => 'hazyclient1@hotmail.com',
            'subtotal' => 210.98,
            'payment_method' => 'PayPal',
            'payment_id' => 'JLjkjqgfa5466fd5q52',
            'address' => "Mijn adres",
            'city' => "Eernegem",
            'postal_code' => "8480",
            'country_id' => 1,
            'total' => 220.98,
            'status' => 'DELIVERED',
            'shippingmethod_id' => 2,
            'payment_cost' => 2.30,
            'shipping_cost' => 10.50,
            'shipping_date' =>  date_create(),
            'created_at_ip' => 'TESTIP',
            'created_at' => Carbon::create(2018,5,19),
            'updated_at' => date_create(),
        ]);
    }
}
