<?php

namespace Muserpol\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

use DB;
use Auth;
use Validator;

use Carbon\Carbon;
use Muserpol\Helper\Util;

use Muserpol\AporTasa;


class createTA extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'creartasapor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creación de tasa aporte mensual';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {   
        $aporTasaLast = AporTasa::orderBy('gest', 'desc')->first();
        $now = Carbon::now();

        $newAporTasa = new AporTasa;

        $newAporTasa->user_id = 1;
              
        $newAporTasa->apor_fr_a = $aporTasaLast->apor_fr_a;
        $newAporTasa->apor_sv_a = $aporTasaLast->apor_sv_a;
        $newAporTasa->apor_a = $aporTasaLast->apor_a;
        
        $newAporTasa->apor_fr_p = $aporTasaLast->apor_fr_p;
        $newAporTasa->apor_sv_p = $aporTasaLast->apor_sv_p;
        $newAporTasa->apor_p = $aporTasaLast->apor_p;

        $newAporTasa->gest = Carbon::createFromDate($now->year, $now->month, 1);

        $newAporTasa->save();

        $this->info("Tasa de Aporte Creado mes de: " . $newAporTasa->gest);
    }
}
