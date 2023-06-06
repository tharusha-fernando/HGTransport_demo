<?php

namespace Database\Seeders;

use App\Models\Vehicle_Owner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Vehicle_OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehicle_Owner::factory()->count(50)->create();
        //
    }
}
