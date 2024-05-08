<?php

namespace Database\Factories;

use App\Models\AgeLimit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    public function definition(): array
    {

        return [
            'name' => $this->faker->sentence,
            'short_description' => $this->faker->sentence,
            'full_description' => $this->faker->sentence,
            'release_date' => $this->faker->date(),
            'image_path' => $this->faker->imageUrl,
            'text_path' => $this->faker->imageUrl,
            'age_limit_id' => AgeLimit::query()->inRandomOrder()->first()->id,
            'subscription_type_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
