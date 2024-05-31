<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $first_name = $this->faker->firstName;
        $last_name = $this->faker->lastName;
        return [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'full_name' => $first_name . ' ' . $last_name
        ];
    }
}
