<?php

namespace App\Console;

use App\Console\Commands\DeleteOldPasswordRequests;
use App\Console\Commands\ExpireResetPasswordRequests;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected function schedule(Schedule $schedule): void
    {
        $schedule->command(ExpireResetPasswordRequests::class)->everyMinute();
        $schedule->command(DeleteOldPasswordRequests::class)->everyMinute();
    }


    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

    }
}
