<?php

namespace App\Services\User;

use App\Models\Subscription;
use App\Models\SubscriptionType;
use App\Models\User;

class SubscriptionService
{
    public function change_subscription($user, int $subscription_type_id)
    {
        $old_subscription = $user->subscription;
        $subscription = new Subscription();

        switch ($subscription_type_id) {
            case 1:
                $subscription->subscription_type_id = 1;
                $subscription->price = SubscriptionType::query()->where('id', 1)->first()->price;
                $subscription->save();
                break;
            case 2:
                $subscription->subscription_type_id = 2;
                $subscription->price = SubscriptionType::query()->where('id', 2)->first()->price;
                $subscription->start_date = now();
                $subscription->end_date = now()->addMonth();
                $subscription->save();
                break;
            case 3:
                $subscription->subscription_type_id = 3;
                $subscription->price = SubscriptionType::query()->where('id', 3)->first()->price;
                $subscription->start_date = now();
                $subscription->end_date = now()->addMonth();
                $subscription->save();
                break;
        }

        $user->subscription()->associate($subscription);

        $user->save();

        $old_subscription->delete();
    }
}
