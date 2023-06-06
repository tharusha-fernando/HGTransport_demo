<?php

namespace Database\Factories;

use App\Models\Drivers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicles>
 */
class VehiclesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'vehicle_number'=>$this->faker->regexify('[A-Z]{3}-[0-9]{3}'),
            'vehicle_model'=>$this->faker->word,
            'size'=>$this->faker->numberBetween($min = 1, $max = 100),//$this->faker->volume($nbMaxDecimals = 2, $min = 0, $max = NULL, $unit = NULL),
            'driver_id'=>Drivers::inRandomOrder()->first(),
            'emisions_testExp'=>$this->faker->dateTimeBetween('-1 year', 'now'),
            'anual_revLicExp'=>$this->faker->dateTimeBetween('-1 year', 'now'),
            'insuarance_Exp'=>$this->faker->dateTimeBetween('-1 year', 'now')
            //''
            //
        ];
    }
}
