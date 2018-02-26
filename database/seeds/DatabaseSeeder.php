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

        $this->call(ProductGroupsTableSeeder::class);

        $this->call(ProductsTableSeeder::class);

        $this->call(LocationsTableSeeder::class);

        $this->call(PagesTableSeeder::class);

        $this->call(ChunksTableSeeder::class);
    }
}
