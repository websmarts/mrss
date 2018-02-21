<?php

use App\Chunk;
use Illuminate\Database\Seeder;

class ChunksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Chunk::create([
            'name' => 'phone_number',
            'description' => 'The toll free number',
            'content' => '1 800 123 456',

        ]);

    }
}
