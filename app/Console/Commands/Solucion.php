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
use Muserpol\Afi;
use Muserpol\Aporte;
use Muserpol\Grado;
use Muserpol\Unidad;
use Muserpol\AporTasa;
use Muserpol\Desglose;
use Muserpol\Categoria;
use Muserpol\Helper\Util;
use Carbon\Carbon;


class Solucion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 's';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {   
        // $password = $this->ask('Estimado Usuario: Escriba la contraseña para realizar la operacion, Gracias.');
        
        // if ($password == ACCESS) {
                
                global $progress, $i, $afi;
                $time_start = microtime(true); 

                $this->info("Resolviendo...\n");
                $progress = $this->output->createProgressBar();
                $progress->setFormat("%current%/%max% [%bar%] %percent:3s%%");

                ini_set('upload_max_filesize', '9999M');
                ini_set('post_max_size', '9999M');
                ini_set('max_execution_time', 36000);
                ini_set('max_input_time', 36000);
                ini_set('memory_limit', '-1');
                set_time_limit(36000);

                Excel::batch('public/solicitud/', function($rows, $file) {   
                    global $progress, $i, $afi;
                    $i = 0;
                    $rows->each(function($result) {
                        global $progress, $i, $afi;
                        $i++;
                        
                        ini_set('upload_max_filesize', '9999M');
                        ini_set('post_max_size', '9999M');
                        ini_set('max_execution_time', 36000);
                        ini_set('max_input_time', 36000);
                        ini_set('memory_limit', '-1');
                        set_time_limit(36000);

                        $afi1 = new Afi;
                        $afi1->id = $result->id;
                        $afi1->carpeta = $result->carpeta;
                        $afi1->nombres = $result->nombres;
                        $afi1->grado = $result->grado;

                        $datos = explode(" ", $afi1->nombres);
                        $afiliado = "";

                        if (in_array("VDA.", $datos)) {
                            switch (count($datos)) {
                                case '5':
                                    $n1 = $datos[0];
                                    $ap = $datos[1];
                                    // $ac = $datos[4];
                                    $afiliado = Afiliado::where('nom', '=', $n1)->where('pat', '=', $ap)->get();
                                break;
                                case '6':
                                    $n1 = $datos[0];
                                    $ap = $datos[1];
                                    $am = $datos[2];
                                    // $ac = $datos[5];
                                    $afiliado = Afiliado::where('nom', '=', $n1)->where('pat', '=', $ap)->where('mat', '=', $am)->get();
                                    if ($afiliado == "") {
                                        $n1 = $datos[0];
                                        $n2 = $datos[1];
                                        $ap = $datos[2];
                                        // $ac = $datos[5];
                                        $afiliado = Afiliado::where('nom', '=', $n1)->where('nom2', '=', $n2)->where('pat', '=', $ap)->get();
                                        }
                                break;
                                case '7':
                                    $n1 = $datos[0];
                                    $n2 = $datos[1];
                                    $ap = $datos[2];
                                    $am = $datos[3];
                                    // $ac = $datos[6];
                                    $afiliado = Afiliado::where('nom', '=', $n1)->where('nom2', '=', $n2)->where('pat', '=', $ap)->where('mat', '=', $am)->get();
                                break;  

                            }
                        }
                        else
                        {   
                            if (in_array("la", $datos)) {
                                switch (count($datos)) {
                                    case '5':
                                        $n1 = $datos[0];
                                        $ap = $datos[1];
                                        $afiliado = Afiliado::where('nom', '=', $n1)->where('pat', '=', $ap)->get();
                                    break;

                                    case '6':
                                        $n1 = $datos[0];
                                        $ap = $datos[4];
                                        $am = $datos[5];
                                        $afiliado = Afiliado::where('nom', '=', $n1)->where('pat', '=', $ap)->where('mat', '=', $am)->get();
                                    break;

                                 }

                            }
                            else
                            {   
                                if(in_array("de", $datos)) {
                                    switch (count($datos)) {
                                        case '4':
                                            $n1 = $datos[0];
                                            $ap = $datos[1];
                                            $afiliado = Afiliado::where('nom', '=', $n1)->where('pat', '=', $ap)->get();
                                        break;

                                        case '5':
                                            $n1 = $datos[0];
                                            $ap = $datos[1];
                                            $am = $datos[2];
                                            $afiliado = Afiliado::where('nom', '=', $n1)->where('pat', '=', $ap)->where('mat', '=', $am)->get();
                                            if ($afiliado == "") {
                                                $n1 = $datos[0];
                                                $n2 = $datos[1];
                                                $ap = $datos[2];
                                                $afiliado = Afiliado::where('nom', '=', $n1)->where('nom2', '=', $n2)->where('pat', '=', $ap)->get();
                                            }
                                        break;
                                    }
                                }
                                else
                                {   
                                    switch (count($datos)) {
                                        case '2':       
                                            $n1 = $datos[0];
                                            $ap = $datos[1];
                                            $afiliado = Afiliado::where('nom', '=', $n1)->where('pat', '=', $ap)->get();
                                            if ($afiliado == "") {
                                                $ap = $datos[0];
                                                $n1 = $datos[1];
                                                $afiliado = Afiliado::where('pat', '=', $ap)->where('nom', '=', $n1)->get();
                                            }
                                        break;

                                        case '3':
                                            $n1 = $datos[0];
                                            $ap = $datos[1];
                                            $am = $datos[2];
                                            $afiliado = Afiliado::where('nom', '=', $n1)->where('pat', '=', $ap)->where('mat', '=', $am)->get();
                                            if ($afiliado == "") {
                                                $ap = $datos[0];
                                                $am = $datos[1];
                                                $n1 = $datos[2];
                                                $afiliado = Afiliado::where('pat', '=', $ap)->where('mat', '=', $am)->where('nom', '=', $n1)->get();
                                            }

                                        break;

                                        case '4':
                                            $n1 = $datos[0];
                                            $n2 = $datos[1];
                                            $ap = $datos[2];
                                            $am = $datos[3];
                                            $afiliado = Afiliado::where('nom', '=', $n1)->where('nom2', '=', $n2)->where('pat', '=', $ap)->where('mat', '=', $am)->get();
                                            if ($afiliado == "") {
                                                $ap = $datos[0];
                                                $am = $datos[1];
                                                $n1 = $datos[2];
                                                $n2 = $datos[3];
                                                            
                                                $afiliado = Afiliado::where('pat', '=', $ap)->where('mat', '=', $am)->where('nom', '=', $n1)->where('nom2', '=', $n2)->get();
                                            }

                                        break;
                                    }

                                }
                            }
                        }

                        if ($afiliado <> "") {
                            foreach ($afiliado as $item) {
                                $afi1->afiliado_id = $item->id;
                                $afi[$i]=$afi1;
                                $i++;
                            }
                        }

                        $progress->advance();
                    });

                });

                Excel::create('Datos', function($excel) {

                    global $progress, $i, $afi;
                    $i = 2;
                    $excel->sheet('Afiliados', function($sheet) { 
                        
                        global $progress, $i, $afi;
                        ini_set('upload_max_filesize', '9999M');
                        ini_set('post_max_size', '9999M');
                        ini_set('max_execution_time', 36000);
                        ini_set('max_input_time', 36000);
                        ini_set('memory_limit', '-1');
                        set_time_limit(36000);

                        $sheet->row(1, array('Id', 'Carpeta', 'Nombres','ITEM MUSERPOL', 'CARNET IDENTIDAD', 'NOMBRES', 'APELLIDO PATERNO', 'APELLIDO MATERNO', 'FECHA NAC', 'SEXO', 'ESTADO CIVIL', 'FECHA INGRESO', 'ULT PERIODO COTIZADO', 'ULT TOTAL GANADO', 'NIV', 'GRA', 'GRADO AFILIADO', 'PERIODO COTIZADO', 'TOTAL COTIZABLE ULTIMOS 3 AÑOS','TOTAL COTIZABLE ULTIMOS 5 AÑOS','TOTAL COTIZABLE ULTIMOS 6 AÑOS'));

                        foreach ($afi as $item) {
                            
                            $afiliado = Afiliado::idIs($item->afiliado_id)->first();
                            $lastAporte = Aporte::afiIs($item->afiliado_id)->orderBy('gest', 'desc')->first();
                                                 
                            $dateLA = Carbon::parse($lastAporte->gest)->year ."/". Util::getMonthMM(Carbon::parse($lastAporte->gest)->month);
                            
                            $totalG = Util::formatMoney($lastAporte->cot);

                            $periodosCoti = DB::table('aportes')
                            ->leftJoin('afiliados', 'aportes.afiliado_id', '=', 'afiliados.id')
                            ->where('afiliados.id', '=', $afiliado->id)
                            ->count();

     
                            $date3 = Carbon::parse($lastAporte->gest)->subYears(3);
                            $date5 = Carbon::parse($lastAporte->gest)->subYears(5);
                            $date6 = Carbon::parse($lastAporte->gest)->subYears(6);

                            $coti3 = DB::table('afiliados')
                            ->select(DB::raw('SUM(aportes.cot) as cot3'))
                            ->leftJoin('aportes', 'afiliados.id', '=', 'aportes.afiliado_id')
                            ->where('afiliados.id', '=', $afiliado->id)
                            ->where('aportes.gest', '>', $date3)
                            ->first();

                            $coti5 = DB::table('afiliados')
                            ->select(DB::raw('SUM(aportes.cot) as cot5'))
                            ->leftJoin('aportes', 'afiliados.id', '=', 'aportes.afiliado_id')
                            ->where('afiliados.id', '=', $afiliado->id)
                            ->where('aportes.gest', '>', $date5)
                            ->first();

                            $coti6 = DB::table('afiliados')
                            ->select(DB::raw('SUM(aportes.cot) as cot6'))
                            ->leftJoin('aportes', 'afiliados.id', '=', 'aportes.afiliado_id')
                            ->where('afiliados.id', '=', $afiliado->id)
                            ->where('aportes.gest', '>', $date6)
                            ->first();

                            $cot3 = Util::formatMoney($coti3->cot3);
                            $cot5 = Util::formatMoney($coti5->cot5);
                            $cot6 = Util::formatMoney($coti6->cot6);

                            if(!$afiliado->grado_id){
                                $afiliado->niv = '';
                                $afiliado->grad = '';
                                $afiliado->lit = '';
                            }else{
                                $afiliado->niv = $afiliado->grado->niv;
                                $afiliado->grad = $afiliado->grado->grad;
                                $afiliado->lit = $afiliado->grado->lit;
                            }

                            $sheet->row($i, array($item->id, $item->carpeta, $item->nombres, $afiliado->id, $afiliado->ci,  $afiliado->nom. " ". $afiliado->nom2, $afiliado->pat, $afiliado->mat, $afiliado->fech_nac, $afiliado->sex, $afiliado->est_civ, $afiliado->fech_ing, $dateLA, $totalG, $afiliado->niv, $afiliado->grad, $afiliado->lit, $periodosCoti, $cot3, $cot5, $cot6));

                            $i++;
                        }

                    });

                })->store('xlsx');  

                $time_end = microtime(true);

                $execution_time = ($time_end - $time_start)/60;


                $progress->finish();
            
                $this->info("\n\n$execution_time [Min] demorados en ejecutar de importacion.\n");
            
        // }
        // else{
        //     $this->error('Contraseña incorrecta!');
        // }
    }
}
