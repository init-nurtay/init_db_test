<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'city' => $this->faker->city,
            'street' => $this->faker->streetName,
            'building' => $this->faker->buildingNumber,
            'apartment' => $this->faker->optional()->numerify('##'),
            'postal_code' => $this->faker->postcode,
            'country_id' => Country::factory()->create(), // Assuming you have a Country factory
        ];
    }
}
