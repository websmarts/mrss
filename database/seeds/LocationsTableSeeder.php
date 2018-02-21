<?php

use App\Location;
use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create(['postcode' => '3821', 'suburb' => 'Rokeby']);
        Location::create(['postcode' => '3820', 'suburb' => 'Warragul']);
        Location::create(['postcode' => '3016', 'suburb' => 'Canterbury']);
    }
}
