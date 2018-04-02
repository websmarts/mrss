<?php

use App\Cartage;
use Illuminate\Database\Seeder;

class CartageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $storageOptions = [
            1 => 98,
            2 => 69,
            3 => 69,
            4 => 69,
            5 => 69,
        ];
        foreach ($storageOptions as $k => $v) {
            Cartage::create([
                'module_count' => $k,
                'cartage_type' => 'storage_return',
                'cost_per_module' => $v,
            ]);
        }

        $diyOptions = [
            1 => 220,
            2 => 160,
            3 => 140,
            4 => 130,
            5 => 124,
        ];
        foreach ($diyOptions as $k => $v) {
            Cartage::create([
                'module_count' => $k,
                'cartage_type' => 'diy_removal',
                'cost_per_module' => $v,
            ]);
        }

    }
}
