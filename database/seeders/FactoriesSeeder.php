<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FactoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(CustomerSeeder::class);
        $this->call(Vehicle_OwnerSeeder::class);
        $this->call(DriversSeeder::class);
        $this->call(VehiclesSeeder::class);
        $this->call(Driver_paymentsSeeder::class);
        $this->call(sectionseeder::class);
        $this->call(InvoicesSeeder::class);
        $this->call(TransportSeeder::class);
        $this->call(TransportSeeder::class);
        $this->call(TransportSeeder::class);
        $this->call(TransportSeeder::class);
        //$this->call(TransportSeeder::class);
        //
    }
}
