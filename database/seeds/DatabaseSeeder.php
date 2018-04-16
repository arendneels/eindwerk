<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ColorsTableSeeder::class);
        $this->call(ColorProductTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CategoryProductTableSeeder::class);
        $this->call(PhotosTableSeeder::class);
        $this->call(SizesTableSeeder::class);
        $this->call(StocksTableSeeder::class);
    }
}
