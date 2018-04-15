<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Client',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('roles')->insert([
            'name' => 'Admin',
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);
    }
}
