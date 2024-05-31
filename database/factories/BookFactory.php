<?php

namespace Database\Factories;

use App\Models\AgeLimit;
use App\Models\SubscriptionType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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
            'release_date' => $this->faker->numberBetween('1500', '2024'),
            'image_path' => UploadedFile::fake()->image('file1.jpeg', 700, 900),
            'text_path' => UploadedFile::fake()->create('1.pdf', 700, 'pdf'),
            'age_limit_id' => AgeLimit::query()->inRandomOrder()->first()->id,
            'subscription_type_id' => SubscriptionType::query()->inRandomOrder()->first()->id,
        ];
    }

}

