<?php

namespace App\Services\Auth;

use App\DTO\Auth\ResetPassword\ResetPasswordDTO;
use App\DTO\Auth\ResetPassword\SendEmailForResetPasswordDTO;
use App\Models\ResetPasswordRequest;
use App\Models\User;
use App\Notifications\Password\PasswordResetNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ResetPasswordService
{
    public function send_email(SendEmailForResetPasswordDTO $data): void
    {
        $user = User::query()->where('email', $data->email)->first();

        $reset_password_request = new ResetPasswordRequest();

        $reset_password_request->token = uuid_create();
        $reset_password_request->email = $data->email;
        $reset_password_request->user_id = $user?->id;

        $reset_password_request->save();

        $notification = new PasswordResetNotification($reset_password_request);

        $user?->notify($notification);
    }

    public function reset_password(ResetPasswordDTO $data, ResetPasswordRequest $reset_password_request): bool
    {
        try {
            /** @var User $user */
            $user = $reset_password_request->user;

            $user->password            = $data->new_password;
            $user->password_changed_at = now();

            $reset_password_request->status = 'completed';
            $reset_password_request->save();

            Auth::login($user);

            return $user->save();
        } catch (\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }
}
