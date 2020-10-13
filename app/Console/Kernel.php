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
    protected $commands = [
        //call command we make 
        commands\TestCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //  php artisan schedule:run
        // $schedule->command('inspire')->hourly();
        //  our Task scheduling
        $schedule->exec('php artisan myproject:refresh')->daily();

        // * * * * * cd /C:\xampp\htdocs\Projects\laravel2\artisan schedule:run >> /dev/null 2>&1
        //  * * * * * php /xampp/htdocs/Projects/laravel2/artisan schedule:run >> /dev/null 2>&1

        //  artisan myproject:refresh > "NUL" 2>&1
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
