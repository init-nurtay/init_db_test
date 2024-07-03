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
            'stage' => fake()->randomElement([
                'new',
                'in_progress',
                'commercial_offer',
                'meeting',
                'document_preparation',
                'final_payment',
                'act_of_completed_work',
                'thanks_letter',
                'rejected'
            ])
        ];
    }
}
