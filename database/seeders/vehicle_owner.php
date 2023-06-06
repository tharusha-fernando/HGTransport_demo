<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class vehicle_owner extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<21;$i++){
            DB::table('vehicle__owners')->insert([
                'name' => Str::random(10),
                'address' => Str::random(10),
                'nic'=>rand(0,12),
                'contact' => Str::random(10),
            ]);
        }
        //
    }
}
