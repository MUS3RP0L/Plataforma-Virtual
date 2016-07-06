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
use Muserpol\AporTasa;
use Muserpol\Reintegro;
use Muserpol\Helper\Util;
use Carbon\Carbon;

class Importreintegro extends Command
{
    protected $signature = 'reintegro';
    protected $description = 'Importacion de Planillas de Haberes Comando General - Reintegros';

   
    public function handle()
    {
        global $nr,$cApor, $progress, $name;
        $password = $this->ask('Estimado Usuario: Escriba la contraseña para realizar la operacion, Gracias.');
        
        if ($password == ACCESS) {

            $name = $this->ask('Estimado Usuario: Escriba el nombre de la carpeta que desea importar, Gracias.');

            if ($this->confirm('Esta seguro de importar la Carpeta ' . $name . '? [y|N]') && $name) {
               
                $time_start = microtime(true);
                $this->info("Importando registros...\n");
                $progress = $this->output->createProgressBar();
                $progress->setFormat("%current%/%max% [%bar%] %percent:3s%%");
                        ini_set('upload_max_filesize', '9999M');
                        ini_set('post_max_size', '9999M');
                        ini_set('max_execution_time', 36000);
                        ini_set('max_input_time', 36000);
                        ini_set('memory_limit', '-1');
                        set_time_limit(36000);

                Excel::batch('public/file_to_import/' . $name . '/', function($rows, $file) {   
                
                    $rows->each(function($result) {

                        global $nr, $cApor, $progress, $name;
                        ini_set('upload_max_filesize', '9999M');
                        ini_set('post_max_size', '9999M');
                        ini_set('max_execution_time', 36000);
                        ini_set('max_input_time', 36000);
                        ini_set('memory_limit', '-1');
                        set_time_limit(36000);

                        $afiliado = Afiliado::where('ci', '=', Util::zero($result->car))->first();
                        $gest = Carbon::createFromDate(Util::formatYear($result->a_o), Util::zero($result->mes), 1);
                        $por_apor = AporTasa::where('gest', '=', Carbon::createFromDate(Util::formatYear($result->a_o), Util::zero($result->mes), 1)->toDateString())->first();
                        if (!$afiliado) {

                            $afiliado = Afiliado::where('pat', '=', $result->pat)->where('mat', '=', $result->mat)
                                                ->where('fech_ing', '=', $result->ing)->first();
                        }
                       if($afiliado)
                       {
                        if (Util::decimal($result->sue)<> 0) {
                            $reintegro = Reintegro::where('gest', '=', Carbon::createFromDate(Util::formatYear($result->a_o), Util::zero($result->mes), 1)->toDateString())
                                                ->where('afiliado_id', '=', $afiliado->id)->first();
                            if (!$reintegro) {

                                $reintegro = new Reintegro;
                                $reintegro->user_id = 1;
                                $reintegro->afiliado_id = $afiliado->id;
                                $reintegro->gest = $gest;
                                $reintegro->sue = Util::decimal($result->sue);
                                $reintegro->b_ant = Util::decimal($result->cat);
                                $reintegro->b_est = Util::decimal($result->est);
                                $reintegro->b_car = Util::decimal($result->carg);
                                $reintegro->b_fro = Util::decimal($result->fro);
                                $reintegro->b_ori = Util::decimal($result->ori);
                                $reintegro->gan = Util::decimal($result->gan);
                                $reintegro->pag = Util::decimal($result->pag);
                                $reintegro->cot = (FLOAT)$reintegro->sue + (FLOAT)$reintegro->b_ant + (FLOAT)$reintegro->b_est + (FLOAT)$reintegro->b_car + (FLOAT)$reintegro->b_fro + (FLOAT)$reintegro->b_ori;
                                $reintegro->mus = Util::decimal($result->mus);
                                if ($reintegro->mus) {
                                    $reintegro->fr = $reintegro->mus * $por_apor->apor_fr_a / $por_apor->apor_a;
                                    $reintegro->sv = $reintegro->mus * $por_apor->apor_sv_a / $por_apor->apor_a;
                                }
                                $reintegro->save();
                                $cApor ++;
                            }
                        }
                        }
                        else{$nr ++;}

                        $progress->advance();
                    });

                });

                $time_end = microtime(true);

                $execution_time = ($time_end - $time_start)/60;
                
                $cApor = $cApor ? $cApor : "0";
                $nr = $nr ? $nr : "0";

                $progress->finish();
            
                $this->info("\n\nEn la carpeta $name Se registraros:\n\n
                    $cApor Reintegros ingresados.\n
                    $nr Afiliados no encontrados.\n 
                    $execution_time [Min] demorados en ejecutar de importación.\n");
            }
        }
        else{
            $this->error('Contraseña incorrecta!');
        }
    }



}
