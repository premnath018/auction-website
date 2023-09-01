<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Product;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            $now = now();

            // Update status to 1 for auctions that have not started yet
            Product::where('BidStartTime', '>', $now)
                ->update(['status' => '1']);

            // Update status to 2 for auctions that are currently active
            Product::where('BidStartTime', '<=', $now)
                ->where('BidEndTime', '>', $now)
                ->update(['status' => '2']);

            // Update status to 3 for auctions that have ended
            Product::where('BidEndTime', '<=', $now)
                ->update(['status' => '3']);
        })->everyMinute(); // You can adjust the frequency here
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
