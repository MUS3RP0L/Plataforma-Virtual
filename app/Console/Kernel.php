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

        \Muserpol\Console\Commands\Import::class,
        // case 1
        \Muserpol\Console\Commands\ImportDDMMAANom::class,
        // case 2
        \Muserpol\Console\Commands\ImportAADDMMNom::class,
        // case 3
        \Muserpol\Console\Commands\ImportAAMMDDNom::class,
        // case 4
        \Muserpol\Console\Commands\ImportAAMMDD::class,
        // case 5
        \Muserpol\Console\Commands\ImportDDMMAA::class,
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
