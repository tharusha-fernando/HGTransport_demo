<?php

namespace Database\Seeders;

use App\Models\Driver_payments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Driver_paymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Driver_payments::factory()->count(2256)->create();
        //
    }
}
