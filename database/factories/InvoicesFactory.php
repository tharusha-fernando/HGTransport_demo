<?php

namespace Database\Factories;

use App\Models\Sections;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoices>
 */
class InvoicesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'invoice_number'=>$this->faker->word,
            'company_id'=>User::whereHas('roles', function($query) {
                $query->where('name', '=', 'administrator');
            })->inRandomOrder()->get()->first(),
    
            'total'=>$this->faker->numberBetween('-9223372036854775808', '9223372036854775807'),
            'paid'=>$this->faker->numberBetween('-9223372036854775808', '9223372036854775807'),
            'unpaid'=>$this->faker->numberBetween('-9223372036854775808', '9223372036854775807'),
            'section'=>Sections::inRandomOrder()->first(),
            'date'=>$this->faker->dateTimeBetween('-1 year', 'now'),
            'drive_link'=>$this->faker->word,
            //
        ];
    }
}
