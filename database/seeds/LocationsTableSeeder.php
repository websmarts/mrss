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
        Location::create(['postcode' => '3821', 'suburb' => 'Rokeby', 'service_premium' => 120]);
        Location::create(['postcode' => '3820', 'suburb' => 'Warragul', 'service_premium' => 110]);
        Location::create(['postcode' => '3016', 'suburb' => 'Canterbury', 'service_premium' => 0]);
    }
}
