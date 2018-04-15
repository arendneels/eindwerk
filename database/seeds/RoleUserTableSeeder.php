<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('role_user')->insert([
            'role_id' => 2,
            'user_id' => 1,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 2,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);

        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 3,
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);
    }
}
