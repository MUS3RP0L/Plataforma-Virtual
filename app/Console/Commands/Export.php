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


class Export extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exportar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Exportación de la Base de Datos - Afiliados';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {   
        // $password = $this->ask('Estimado Usuario: Escriba la contraseña para realizar la operacion, Gracias.');
        
        // if ($password == ACCESS) {


            if ($this->confirm('Esta seguro de exportar a los Afiliados? [y|N]')) {

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

               Excel::create('Datos', function($excel) {

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

                        $sheet->row(1, array('AFP', 'NUA', 'CARNET IDENTIDAD', 'ITEM MUSERPOL', 'NOMBRES', 'APELLIDO PATERNO', 'APELLIDO MATERNO', 'FECHA NAC', 'SEXO', 'ESTADO CIVIL', 'FECHA INGRESO', 'ULT PERIODO COTIZADO', 'TOTAL GANADO', 'NIV', 'GRA', 'GRADO AFILIADO', 'PERIODO COTIZADO', 'SALDO CUENTA PREV BS'));

						foreach ($afiliados as $item) {

							$lastAporte = Aporte::afiliadoId($item->id)->orderBy('gest', 'desc')->first();
							if ($lastAporte) {
							
								$dateLA = Carbon::parse($lastAporte->gest)->year . Util::getMonthMM(Carbon::parse($lastAporte->gest)->month);
								
								$totalG = Util::formatMoney($lastAporte->cot);

						        $periodosCoti = DB::table('aportes')
						        ->leftJoin('afiliados', 'aportes.afiliado_id', '=', 'afiliados.id')
						        ->where('afiliados.id', '=', $item->id)->count();

						        $totalMuserpol = DB::table('afiliados')
				                ->select(DB::raw('SUM(aportes.mus) as muserpol'))
				                ->leftJoin('aportes', 'afiliados.id', '=', 'aportes.afiliado_id')
				                ->where('afiliados.id', '=', $item->id)->first();
				                $totalM = Util::formatMoney($totalMuserpol->muserpol);

				                if(!$item->grado_id){
									$item->niv = '';
									$item->grad = '';
									$item->lit = '';
				                }else{
				                	$item->niv = $item->grado->niv;
									$item->grad = $item->grado->grad;
									$item->lit = $item->grado->lit;
				                }

								$sheet->row($item->id+1, array($item->afp, $item->nua, $item->ci, $item->id, $item->nom. " ". $item->nom2, $item->pat, $item->mat, $item->fech_nac, $item->sex, $item->est_civ, $item->fech_ing, $dateLA, $totalG,$item->niv, $item->grad, $item->lit, $periodosCoti, $totalM));
								$progress->advance(); 
							}
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
