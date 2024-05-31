<?php

namespace App\Services\Admin;

use App\DTO\Admin\User\IndexDataForUsersDTO;
use App\DTO\Admin\User\SearchUserDTO;
use App\Http\Filters\UserFilter;
use App\Models\SubscriptionType;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

class UserService
{
    public function get_users(SearchUserDTO $data): LengthAwarePaginator
    {
        $filter = app()->make(UserFilter::class, ['queryParams' => array_filter($data->toArray())]);

        return User::with('subscription', 'subscription.subscription_type')->filter($filter)->paginate(20)->withQueryString();
    }

    public function get_index_data()
    {
        $subscription_types = Cache::remember('subscription_types', 3600, function () {
            return SubscriptionType::query()->with('features')->get();
        });

        return new IndexDataForUsersDTO([
            'subscription_types' => $subscription_types,
        ]);
    }

}
