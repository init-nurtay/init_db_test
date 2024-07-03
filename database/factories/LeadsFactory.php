<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lead>
 */
class LeadsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
'name' => fake()->name(),
'email' => fake()->email(),
'company' => fake()->company(),
'phone' => fake()->phoneNumber(),
'comment' => fake(),
'source' => fake(),
'stage' => fake()->randomElement(['new', 'contacted', 'qualified', 'unqualified', 'in_progress', 'lost', 'completed'])
        ];
    }
}
