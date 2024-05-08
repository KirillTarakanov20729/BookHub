<?php

namespace App\Console\Commands;

use App\Models\Subscription;
use App\Models\SubscriptionType;
use App\Models\User;
use Illuminate\Console\Command;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $subscription = new Subscription();
        $subscription->subscription_type_id = SubscriptionType::query()->first()->id;
        $subscription->save();

        $user = User::factory(1)->create([
            'email' => 'admin@mail.ru',
            'password' => bcrypt('password'),
            'subscription_id' => $subscription->id,
            'is_admin' => 1]);
    }
}
