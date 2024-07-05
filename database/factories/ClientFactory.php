<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'organization_type' => $this->faker->randomElement(['Type A', 'Type B', 'Type C']),
            'identification_number' => $this->faker->numerify('##########'),
            'organization_name' => $this->faker->company,
            'chief_full_name' => $this->faker->name,
            'agent_type' => $this->faker->randomElement(['Agent Type 1', 'Agent Type 2']),
            'bank_name' => $this->faker->name(),
            'identification_code' => $this->faker->numerify('############'),
            'beneficiary_code' => $this->faker->numerify('############'),
            'address_id' => Address::factory()->create(),
        ];
    }
}
