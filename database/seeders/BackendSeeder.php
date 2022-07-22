<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BackendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'Name'=>'Laravel',
            'Email'=>'site@gmail.com',
            'Address' => 'Dhaka, Bangladesh',
            'Logo'=>'backend_image/Logo/CHcGBcFhZnFdqVUCjQKW.png',
            'ContactNumber'=> '123456789',
            'About' => 'Lorum OIspum',
            'Status' => '1'
      
        ]);
    }
}
