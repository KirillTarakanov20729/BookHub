<?php

namespace Database\Seeders;

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
        SubscriptionType::factory(1)->create(['name' => 'Бесплатная','price' => 0]);
        SubscriptionType::factory(1)->create(['name' => 'Стандарт','price' => 500]);
        SubscriptionType::factory(1)->create(['name' => 'Премиум','price' => 1000]);
    }
}
