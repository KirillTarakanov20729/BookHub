<?php

namespace App\Services\Admin;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    public function get_users(array $data): LengthAwarePaginator
    {
        $usersQuery = User::query();

        if (isset($data['name'])) {
            $usersQuery->where('name', 'like', '%' . $data['name'] . '%');
        }

        if (isset($data['subscription_type_id']) && $data['subscription_type_id'] > 0) {
            $usersQuery->with('subscription')
                ->whereHas('subscription', function ($query) use ($data) {
                    $query->where('subscription_type_id', $data['subscription_type_id']);
                });
        }

        return $usersQuery->paginate(20);
    }
}
