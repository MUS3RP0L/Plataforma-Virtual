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


class CreateTA extends Command
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
        $newAporTasa = new AporTasa;
        $newAporTasa->user_id = 1;
              
        $newAporTasa->apor_fr_a = $aporTasaLast->apor_fr_a;
        $newAporTasa->apor_sv_a = $aporTasaLast->apor_sv_a;
        $newAporTasa->apor_a = $newAporTasa->apor_fr_a + $newAporTasa->apor_sv_a;

        $newAporTasa->apor_am_p = $aporTasaLast->apor_am_p;
        
        $fecha = Carbon::parse($aporTasaLast->gest);
        $newAporTasa->gest = $fecha->addMonth();
        $newAporTasa->save();
        $this->info("Tasa de Aporte Creado mes de: " . $newAporTasa->gest);
    }
}
