<?php

namespace App\Console;

use App\Models\Hardware;
use App\Models\Software;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {


        $schedule->call(function () {
            $software = new Software();
            $software->notifyExpiry();
            $hardware = new Hardware();
            $hardware->notifyExpiry();
        })->everySixHours();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
