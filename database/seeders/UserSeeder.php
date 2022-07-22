<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->insert([

            'first_name' => 'Sam',
            'last_name' => 'Dawson',
            'username' => 'Sam',
            'email' => 'sam@example.com',
            'password' => Hash::make('123456789'),
            'account_type' => 'user',
      
        ]);
    }
}
