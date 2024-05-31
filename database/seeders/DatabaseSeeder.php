<?php

namespace Database\Seeders;

use App\Models\AgeLimit;
use App\Models\Genre;
use App\Models\Publisher;
use App\Models\SubscriptionType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call(FeaturesSeeder::class);
        $this->call(SubscriptionTypesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(GenresSeeder::class);
        $this->call(AuthorsSeeder::class);
        $this->call(PublishersSeeder::class);
        $this->call(AgeLimitsSeeder::class);
        $this->call(BooksSeeder::class);
    }




}
