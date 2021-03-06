<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = Faker\Factory::create();

        DB::table('users')->insert([
            'first_name' => "Admin",
            'last_name' => "Neels",
            'address' => "Mijn adres",
            'city' => "Roeselare",
            'postal_code' => "8800",
            'country_id' => 1,
            'phone' => "0472/284 546",
            'email' => "admin@hotmail.com",
            'password' => bcrypt('123456'),
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('users')->insert([
            'first_name' => "Client",
            'last_name' => "Neels",
            'address' => "Mijn adres",
            'city' => "Roeselare",
            'postal_code' => "8800",
            'country_id' => 1,
            'phone' => "0472/288 544",
            'email' => "client@hotmail.com",
            'password' => bcrypt('123456'),
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('users')->insert([
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'address' => $faker->streetAddress,
            'city' => $faker->city,
            'postal_code' => $faker->postcode,
            'country_id' => 2,
            'phone' => $faker->phoneNumber,
            'email' => $faker->email,
            'password' => bcrypt('123456'),
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('users')->insert([
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'address' => $faker->streetAddress,
            'city' => $faker->city,
            'postal_code' => $faker->postcode,
            'country_id' => 1,
            'phone' => $faker->phoneNumber,
            'email' => $faker->email,
            'password' => bcrypt('123456'),
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('users')->insert([
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'address' => $faker->streetAddress,
            'city' => $faker->city,
            'postal_code' => $faker->postcode,
            'country_id' => 3,
            'phone' => $faker->phoneNumber,
            'email' => $faker->email,
            'password' => bcrypt('123456'),
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);
    }
}
