<?php

namespace App\Console\Commands;

use App\Models\Subscription;
use App\Models\SubscriptionType;
use App\Models\User;
use Illuminate\Console\Command;

class CreateRandomUserLevel1 extends Command
{
    protected $signature = 'app:create-random-user-level1 {count}';

    public function handle()
    {
        $count = $this->argument('count');

        $subscription = new Subscription();
        $subscription->subscription_type_id = SubscriptionType::query()->first()->id;
        $subscription->save();

        $users = User::factory($count)->create(['subscription_id' => $subscription->id]);
    }
}