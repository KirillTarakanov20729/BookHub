<?php

namespace Database\Seeders;

use App\Models\Subscription;
use App\Models\SubscriptionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 4; $i++) {

            if ($i == 1) {
                $subscriptionType = new SubscriptionType;
                $subscriptionType->name = 'Бесплатная';
                $subscriptionType->price = 0;
                $subscriptionType->save();

                $subscriptionType->features()->attach([$i]);
            }

            if ($i == 2) {
                $subscriptionType = new SubscriptionType;
                $subscriptionType->name = 'Стандарт';
                $subscriptionType->price = 500;
                $subscriptionType->save();

                $subscriptionType->features()->attach([$i]);
            }

            if ($i == 3) {
                $subscriptionType = new SubscriptionType;
                $subscriptionType->name = 'Премиум';
                $subscriptionType->price = 1000;
                $subscriptionType->save();

                $subscriptionType->features()->attach([$i]);
            }
        }
    }
}
