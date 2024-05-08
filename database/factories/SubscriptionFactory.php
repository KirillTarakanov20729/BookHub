<?php

namespace Database\Factories;

use App\Models\SubscriptionType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subscription_type_id = SubscriptionType::query()->inRandomOrder()->first()->id;
        if ($subscription_type_id == 1) {
            $start_date = null;
            $end_date = null;
        }
        else {
            $start_date = now();
            $end_date = now()->addMonth();
        }

        return [
            'subscription_type_id' => $subscription_type_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'price' => SubscriptionType::query()->find($subscription_type_id)->price,
        ];
    }


}
