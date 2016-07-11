<?php

namespace Muserpol\Console;

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

        \Muserpol\Console\Commands\ImportPayroll::class,
        \Muserpol\Console\Commands\Solucion::class,
        \Muserpol\Console\Commands\CreateTA::class,  
        \Muserpol\Console\Commands\Export::class,    
        \Muserpol\Console\Commands\Export2::class,
        \Muserpol\Console\Commands\CreateIPC::class,
        \Muserpol\Console\Commands\Importreintegro::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
                 ->hourly();
    }
}
