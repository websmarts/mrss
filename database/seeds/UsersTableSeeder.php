<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['email' => 'iwmaclagan@gmail.com', 'name' => 'ian', 'password' => bcrypt('pass')]);

    }
}
