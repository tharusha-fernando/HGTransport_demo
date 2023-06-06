<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Drivers>
 */
class DriversFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'nic' => $this->faker->randomNumber(9),
            'contact' => $this->faker->phoneNumber(),
            'license_expirationLicense_expiration'=>$this->faker->dateTimeBetween('-1 year', 'now'),
            'license_expirationLicense_expiration1'=>$this->faker->dateTimeBetween('-1 year', 'now')
            //
        ];
    }
}
