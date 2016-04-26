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


class Import extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importacion de Archivos por Carpeta';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {   global $name;
        $password = $this->ask('Estimado Usuario: Escriba la contraseña para realizar la operacion, Gracias.');
        
        if ($password == ACCESS) {

            $name = $this->ask('Estimado Usuario: Escriba el nombre de la carpeta que desea importar, Gracias.');

            if ($this->confirm('Esta seguro de importar la Carpeta ' . $name . '? [y|N]') && $name) {

                global $cAfiN, $cAfiU, $cApor, $progress;

                $time_start = microtime(true); 

                $this->info("Importando registros...\n");
                $progress = $this->output->createProgressBar();
                $progress->setFormat("%current%/%max% [%bar%] %percent:3s%%");

                Excel::batch('public/file_to_import/' . $name . '/', function($rows, $file) {   
                
                    $rows->each(function($result) {

                        global $cAfiN, $cAfiU, $cApor, $progress, $name;
                        ini_set('upload_max_filesize', '9999M');
                        ini_set('post_max_size', '9999M');
                        ini_set('max_execution_time', 36000);
                        ini_set('max_input_time', 36000);
                        ini_set('memory_limit', '-1');
                        set_time_limit(36000);
                        
                        $afiliado = Afiliado::where('ci', '=', Util::zero($result->car))->first();
                        
                        $gest = Carbon::createFromDate(Util::formatYear($result->a_o), Util::zero($result->mes), 1);
                        $desglose_id = Desglose::select('id')->where('cod', $result->desg)->first()->id;
                        $unidad_id = Unidad::select('id')->where('cod', $result->uni)->where('desglose_id', $desglose_id)->first()->id;
                        if ($result->niv == '04' && $result->gra == '15'){$result->niv = '03';}
                        $grado_id = Grado::select('id')->where('niv', $result->niv)->where('grad', $result->gra)->first()->id;
                        $categoria_id = Categoria::select('id')->where('por', Util::calcCat(Util::decimal($result->cat),Util::decimal($result->sue)))->first()->id;
                        $por_apor = AporTasa::where('gest', '=', Carbon::createFromDate(Util::formatYear($result->a_o), Util::zero($result->mes), 1)->toDateString())->first();

                        if (!$afiliado) {

                            $afiliado = Afiliado::where('pat', '=', $result->pat)->where('mat', '=', $result->mat)
                                                ->where('fech_nac', '=', Util::date($result->nac))
                                                ->where('fech_ing', '=', Util::date($result->ing))->first();
                            if (!$afiliado) {

                                $afiliado = new Afiliado;
                                $afiliado->sex = $result->sex;
                                $afiliado->fech_est = $gest;
                                $cAfiN ++;

                            }else{$cAfiU ++;}

                            $afiliado->ci = Util::zero($result->car);

                        }else{$cAfiU ++;}
                        
                        switch ($result->desg) {
                            
                            case '1'://Disponibilidad
                                $afiliado->afi_state_id = 4;
                                if ($afiliado->afi_state_id <> 4){$afiliado->fech_est = $gest;}
                            break;

                            case '3'://Comisión
                                $afiliado->afi_state_id = 3;
                                if ($afiliado->afi_state_id <> 3){$afiliado->fech_est = $gest;}
                            break;

                            case '5'://Batallón
                                $afiliado->afi_state_id = 2;
                                if ($afiliado->afi_state_id <> 2){$afiliado->fech_est = $gest;}
                            break;

                            default://Comando
                                $afiliado->afi_state_id = 1;
                                if ($afiliado->afi_state_id <> 1){$afiliado->fech_est = $gest;}
                        }                                                        
                        
                        $afiliado->user_id = 1;
                        $afiliado->fech_lastg = $gest;
                        $afiliado->pat = $result->pat;
                        $afiliado->mat = $result->mat;
                        $afiliado->nom = $result->nom;
                        $afiliado->nom2 = $result->nom2;
                        $afiliado->ap_esp = $result->apes;
                        $afiliado->est_civ = $result->eciv;
                        $afiliado->desglose_id = $desglose_id;                           
                        $afiliado->categoria_id = $categoria_id;
                        $afiliado->afp = Util::getAfp($result->afp);
                        $afiliado->matri = Util::calcMatri($result->nac, $afiliado->pat, $afiliado->mat, $afiliado->nom, $afiliado->sex);                           
                        $afiliado->fech_nac = Util::date($result->nac);
                        $afiliado->fech_ing = Util::date($result->ing);
                        $afiliado->nua = $result->nua;
                        if ($afiliado->unidad_id <> $unidad_id) {
                            $afiliado->fech_uni = $gest;
                        }
                        $afiliado->unidad_id = $unidad_id;              
                        if ($afiliado->grado_id <> $grado_id) {
                            $afiliado->fech_gra = $gest;
                        }
                        $afiliado->grado_id = $grado_id;                                                                           
                        $afiliado->save();

                        if (Util::decimal($result->sue)<> 0) {

                            $aporte = Aporte::where('gest', '=', Carbon::createFromDate(Util::formatYear($result->a_o), Util::zero($result->mes), 1)->toDateString())
                                                ->where('afiliado_id', '=', $afiliado->id)->first();

                            if (!$aporte) {

                                $aporte = new Aporte;
                                $aporte->user_id = 1;
                                $aporte->aporte_type_id = 1;
                                $aporte->afiliado_id = $afiliado->id;
                                $aporte->gest = $gest;
                                $aporte->desglose_id = $desglose_id;
                                $aporte->unidad_id = $unidad_id;
                                $aporte->grado_id = $grado_id;
                                $aporte->categoria_id = $categoria_id;
                                $aporte->item = $result->item;
                                $aporte->sue = Util::decimal($result->sue);
                                $aporte->b_ant = Util::decimal($result->cat);
                                $aporte->b_est = Util::decimal($result->est);
                                $aporte->b_car = Util::decimal($result->carg);
                                $aporte->b_fro = Util::decimal($result->fro);
                                $aporte->b_ori = Util::decimal($result->ori);
                                $aporte->b_seg = Util::decimal($result->bseg);
                                $aporte->dfu = $result->dfu;
                                $aporte->nat = $result->nat;
                                $aporte->lac = $result->lac;
                                $aporte->pre = $result->pre;
                                $aporte->sub = Util::decimal($result->sub);
                                $aporte->gan = Util::decimal($result->gan);
                                $aporte->pag = Util::decimal($result->pag);
                                $aporte->cot = (FLOAT)$aporte->sue + (FLOAT)$aporte->b_ant + (FLOAT)$aporte->b_est + (FLOAT)$aporte->b_car + (FLOAT)$aporte->b_fro + (FLOAT)$aporte->b_ori;
                                $aporte->mus = Util::decimal($result->mus);
                                if ($aporte->mus) {
                                    $aporte->fr = $aporte->mus * $por_apor->apor_fr_a / $por_apor->apor_a;
                                    $aporte->sv = $aporte->mus * $por_apor->apor_sv_a / $por_apor->apor_a;
                                }
                                $aporte->save();
                                $cApor ++;
                            }
                            
                        }
                        $progress->advance();
                    });

                });

                $time_end = microtime(true);

                $execution_time = ($time_end - $time_start)/60;
                
                $cAfiT = $cAfiN + $cAfiU;
                $cAfiN = $cAfiN ? $cAfiN : "0";
                $cAfiU = $cAfiU ? $cAfiU : "0";
                $cAfiT = $cAfiT ? $cAfiT : "0";
                $cApor = $cApor ? $cApor : "0";

                $progress->finish();
            
                $this->info("\n\nEn la carpeta . $name . Se registraros:\n\n" . $cAfiN .
                 " Afiliados Nuevos.\n" . $cAfiU .
                 " Afiliados Actualizados.\n" . $cAfiT .
                 " Afiliados en total.\n" . $cApor . 
                 " Aportes.\n" . $execution_time . 
                 " [Min] demorados en ejecutar de importación.\n");

            }

        }
        else{
            $this->error('Contraseña incorrecta!');
        }
    }
}
