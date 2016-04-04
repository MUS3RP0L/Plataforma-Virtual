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
        // case 1 ImportDDMMAANom
        \Muserpol\Console\Commands\ImportC1::class,
        // case 2 ImportC1
        \Muserpol\Console\Commands\ImportC2::class,
        // case 3 ImportAAMMDDNom
        \Muserpol\Console\Commands\ImportC3::class,
        // case 4 ImportAAMMDD
        \Muserpol\Console\Commands\ImportC4::class,
        // case 5 ImportDDMMAA
        \Muserpol\Console\Commands\ImportC5::class,
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
