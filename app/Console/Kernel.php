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
        \Muserpol\Console\Commands\Inspire::class,
        \Muserpol\Console\Commands\Import::class,
        \Muserpol\Console\Commands\ImportNom::class,
        \Muserpol\Console\Commands\ImportAADDMMNom::class,
        \Muserpol\Console\Commands\ImportAAMMDDNom::class,
        \Muserpol\Console\Commands\ImportAAMMDD::class,
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
