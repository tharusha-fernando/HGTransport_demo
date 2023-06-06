<?php

namespace Database\Seeders;

use App\Models\Drivers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriversSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Drivers::factory()->count(90)->create();
        //
    }
}
