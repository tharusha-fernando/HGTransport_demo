<?php

namespace Database\Seeders;

use App\Models\Invoices;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->command->info('Seeding Invoices...'); //Seeding Transports...
        Invoices::factory()->count(90)->create();
        //
    }
}
