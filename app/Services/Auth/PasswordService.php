<?php

namespace App\Services\Auth;

use App\DTO\Auth\ChangePasswordDTO;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class PasswordService
{
    public function change_password(User $user, ChangePasswordDTO $data): bool
    {
        try {
            $user->password            = $data->new_password;
            $user->password_changed_at = now();

            Cache::put('user_' . $user->id, $user, 3600);

            return $user->save();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return false;
        }
    }
}
