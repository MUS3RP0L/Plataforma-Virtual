<?php

namespace Muserpol\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

use DB;
use Auth;
use Session;
use Validator;
use Muserpol\Http\Requests;
use Muserpol\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Muserpol\Afiliado;
use Muserpol\Aporte;
use Muserpol\Grado;
use Muserpol\Unidad;
use Muserpol\AporTasa;
use Muserpol\Desglose;
use Muserpol\Categoria;
use Muserpol\Helper\Util;
use Carbon\Carbon;


class Export2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exportar2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Exportación de la Base de Datos - Aportes';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {   
        // $password = $this->ask('Estimado Usuario: Escriba la contraseña para realizar la operacion, Gracias.');
        
        // if ($password == ACCESS) {

            if ($this->confirm('Esta seguro de exportar a los Aportes de? [y|N]')) {

                global $progress;

                $time_start = microtime(true); 

                $this->info("Exportando registros...\n");
                $progress = $this->output->createProgressBar();
                $progress->setFormat("%current%/%max% [%bar%] %percent:3s%%");

                ini_set('upload_max_filesize', '9999M');
                ini_set('post_max_size', '9999M');
                ini_set('max_execution_time', 36000);
                ini_set('max_input_time', 36000);
                ini_set('memory_limit', '-1');
                set_time_limit(36000);

               Excel::create('Aportes', function($excel) {

               		global $progress;

            		$excel->sheet('Afiliados', function($sheet) { 
						
						global $progress;
                        ini_set('upload_max_filesize', '9999M');
                        ini_set('post_max_size', '9999M');
                        ini_set('max_execution_time', 36000);
                        ini_set('max_input_time', 36000);
                        ini_set('memory_limit', '-1');
                        set_time_limit(36000);

                        $afiliados = Afiliado::all();
                        // $afiliados = DB::table('afiliados')->whereBetween('id', [1, 5])->get();

                        $base = array('CARNET IDENTIDAD', 'ITEM MUSERPOL');
                        $mes = array('FECHA APORTE', 'SUELDO GANADO', 'TOTAL COTIZABLE', 'LIQUIDO PAGABLE', 'APORTE FR', 'APORTE SV', 'TOTAL APORTE');
             
                        // for ($j=1; $j <= 12; $j++) { 
                            $base = array_merge($base, $mes);
                        // }
                        $sheet->row(1, $base);

						foreach ($afiliados as $item) {

                            $base = array($item->ci, $item->id);

                            $aportes = Aporte::afiliadoId($item->id)->get();

                            foreach ($aportes as $aporte) {

                                $dateLA = Carbon::parse($aporte->gest)->year . '-' . Util::getMonthMM(Carbon::parse($aporte->gest)->month);

                                $aporteA = array($dateLA, $aporte->sue, $aporte->cot, $aporte->pag, $aporte->fr, $aporte->sv, $aporte->mus);
                                
                                $base = array_merge($base, $aporteA);
                            }
                        
							$sheet->row($item->id+1, $base);
							$progress->advance(); 
						}   

                 	});

        		})->store('xlsx');

                $time_end = microtime(true);

                $execution_time = ($time_end - $time_start)/60;

                $progress->finish();
            
                $this->info("\n\nResultado:\n\n
                    $execution_time [Min] demorados en ejecutar de importación.\n");
            }
        // }
        // else{
        //     $this->error('Contraseña incorrecta!');
        // }
    }
}
