<?php

namespace App\Console;

use App\Models\Promo;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $query = Promo::where('promo_selesai', '<', Carbon::now()->format('Y-m-d h:i:s'));
        $schedule->call(fn () => $query->delete())->everyTwoMinutes();
        // Utk jalanin scheduler nya scr lokal, pake php artisan schedule:work
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
