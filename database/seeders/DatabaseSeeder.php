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
        $this->create_subscription_types();
        $this->create_users();

        $this->create_admin();
        $this->call(GenresSeeder::class);
        $this->call(AuthorsSeeder::class);
        $this->call(PublishersSeeder::class);
        $this->call(AgeLimitsSeeder::class);
        $this->call(BooksSeeder::class);
    }

    public function create_admin()
    {
        return User::factory(1)->create(['name' => 'admin','email' => 'admin@mail.ru','password' => 'password' ,'is_admin' => 1])->first();
    }

    public function create_users(): void
    {
        User::factory(30)->create();
    }

    public function create_subscription_types(): void
    {
        SubscriptionType::factory(1)->create(['price' => 0]);
        SubscriptionType::factory(1)->create(['price' => 500]);
        SubscriptionType::factory(1)->create(['price' => 1000]);
    }


}
