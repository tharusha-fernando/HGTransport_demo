<?php

namespace Database\Factories;

use App\Models\Drivers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver_payments>
 */
class Driver_paymentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date'=>$this->faker->dateTimeBetween('-1 year', 'now'),
            'amount'=>$this->faker->randomFloat(2, 0, 999999.99),
            'description'=>$this->faker->sentence(),
            'driver_id'=>Drivers::inRandomOrder()->first()
            //
        ];
    }
}
