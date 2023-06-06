<?php

namespace Database\Factories;

use App\Models\Invoices;
use App\Models\Transport;
use App\Models\Vehicles;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transport>
 */
class TransportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Transport::class;

    public function definition()
    {
        
        return [
            'vehicle_id' => Vehicles::inRandomOrder()->value('id'),//
            'transport_type' => $this->faker->randomElement(['road', 'rail', 'air', 'sea']),
            'size' => $this->faker->randomElement(['small', 'medium', 'large']),
            'date' => $this->faker->date(),
            'destination_from' => $this->faker->city,
            'destination_to' => $this->faker->city,
            'in_date' => $this->faker->date(),
            'in_time' => $this->faker->time(),
            'out_date' => $this->faker->date(),
            'out_time' => $this->faker->time(),
            'destination_return_from' => $this->faker->optional()->city,
            'destination_return_to' => $this->faker->optional()->city,
            'referrence_number' => $this->faker->unique()->randomNumber(),
            'transport_amount' => $this->faker->randomFloat(2, 1000, 10000),
            'start_meter' => $this->faker->optional()->randomFloat(2, 0, 100000),
            'end_meter' => $this->faker->optional()->randomFloat(2, 0, 100000),
            'total_km' => $this->faker->optional()->randomFloat(2, 0, 10000),
            'transport_amount_return' => $this->faker->randomFloat(2, 1000, 10000),
            'total_hrs' => $this->faker->randomFloat(2, 0, 24),
            'free_hrs' => $this->faker->randomFloat(2, 0, 24),
            'demurrage_hrs' => $this->faker->randomFloat(2, 0, 24),
            'demurrage_amount' => $this->faker->randomFloat(2, 1000, 10000),
            'highway' => $this->faker->randomFloat(2, 1000, 10000),
            'bor' => $this->faker->randomFloat(2, 1000, 10000),
            'con_hiring' => $this->faker->randomFloat(2, 1000, 10000),
            'unloadings' => $this->faker->randomFloat(2, 1000, 10000),
            'ticket' => $this->faker->randomFloat(2, 1000, 10000),
            'loadings' => $this->faker->randomFloat(2, 1000, 10000),
            'warehouse' => $this->faker->randomFloat(2, 1000, 10000),
            'labour' => $this->faker->randomFloat(2, 1000, 10000),
            'gate_pass' => $this->faker->text,
            'red__copyReferrenceNumber' => $this->faker->unique()->randomNumber(),
            'invoice_id' => Invoices::inRandomOrder()->value('id'),
            //'deleted_at' => $this->faker->optional()->dateTime(),
            //'created_at' => Carbon::now(),
            //'updated_at' => Carbon::now(),
            'created_by' => $this->faker->name,
            'updated_by' => null,
            'deleted_by' => null,
            'total_distance' => 0,
            'total' => 0.00,
            //
        ];
    }
}
