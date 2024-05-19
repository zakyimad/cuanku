<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\mutation>
 */
class MutationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2,4)),
            'amount' => rand(10000,30000),
            'from_id' => rand(1,5),
            'to_id' => rand(1,5),
            'user_id' => '1',
            'date' => $this->faker->dateTimeThisMonth()
        ];
    }
}
