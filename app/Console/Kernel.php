<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    // include File Make Commend
    protected $commands = [
        Commands\TestCommend::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    // TO Run The Order
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        //* * * * * php /localhost/Demo_Log/public/artisan schedule:run >> /dev/null 2>&1
        //php artisan project:refresh > "NUL" 2>&1
        $schedule->exec('php artisan project:refresh')->evenInMaintenanceMode();// code work as well as project down
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
