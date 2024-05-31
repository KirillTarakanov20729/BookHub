<?php

namespace App\Console\Commands;

use App\Models\ResetPasswordRequest;
use Illuminate\Console\Command;

class ExpireResetPasswordRequests extends Command
{

    protected $signature = 'app:expire-reset-password-requests';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        ResetPasswordRequest::query()
            ->where('created_at', '<', now()->subHours(1))
            ->where('status', 'pending')
            ->update(['status' => 'expired']);
    }
}
