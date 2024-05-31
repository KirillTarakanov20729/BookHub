<?php

namespace App\Console\Commands;

use App\Models\ResetPasswordRequest;
use Illuminate\Console\Command;

class DeleteOldPasswordRequests extends Command
{

    protected $signature = 'app:delete-expired-password-requests';


    public function handle()
    {
        ResetPasswordRequest::query()->where('created_at', '<=', now()->subDays(5))->delete();
    }
}
