<?php

use App\ProductGroup;
use Illuminate\Database\Seeder;

class ProductGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Storage Module seeds
        ProductGroup::create(['name' => 'storage-module']);
        ProductGroup::create(['name' => 'removal-module']);
        ProductGroup::create(['name' => 'extra']);
        ProductGroup::create(['name' => 'insurance']);

    }
}
