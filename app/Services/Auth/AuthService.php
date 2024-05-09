<?php

namespace App\Services\Auth;

use App\DTO\Auth\LoginDTO;
use App\Models\Subscription;
use App\Models\SubscriptionType;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthService
{
    public function register_user(array $data): bool
    {
        try {
            $subscription = new Subscription();
            $subscription_type = SubscriptionType::query()->first();
            $subscription->subscription_type_id = $subscription_type->id;
            $subscription->save();

            $user           = new User();
            $user->name     = $data['name'];
            $user->email    = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->subscription_id = $subscription->id;
            return $user->save();
        }
        catch (\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }

    public function login_user(LoginDTO $data): bool
    {
        try {
            if (Auth::attempt(['email' => $data->email, 'password' => $data->password], $data->remember)) {
                return true;
            }
            else {
                return false;
            }
        }
        catch (\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }
}
