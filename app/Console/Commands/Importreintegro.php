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
use Muserpol\Affiliate;
use Muserpol\ContributionRate;
use Muserpol\Reimbursement;
use Muserpol\Helper\Util;
use Carbon\Carbon;

class Importreintegro extends Command
{
    protected $signature = 'reintegro';
    protected $description = 'Importacion de Planillas de Haberes Comando General - Reintegros';

   
    public function handle()
    {
        global $nr,$cApor, $progress, $name;
        $password = $this->ask('Enter the password');
        
        if ($password == ACCESS) {

            $name = $this->ask('Enter the name of the folder you want to import');

            if ($this->confirm('Are you sure to import the folder ' . $name . '? [y|N]') && $name) {
               
                $time_start = microtime(true);
                $this->info("Importing...\n");
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

                        $afiliado = Affiliate::where('identity_card', '=', Util::zero($result->car))->first();
                        $gest = Carbon::createFromDate(Util::formatYear($result->a_o), Util::zero($result->mes), 1);
                        $por_apor = ContributionRate::where('month_year', '=', Carbon::createFromDate(Util::formatYear($result->a_o), Util::zero($result->mes), 1)->toDateString())->first();
                        if (!$afiliado) {

                            $afiliado = Affiliate::where('last_name', '=', $result->pat)->where('mothers_last_name', '=', $result->mat)
                                                ->where('date_entry', '=', $result->ing)->first();
                        }
                       if($afiliado)
                       {
                        if (Util::decimal($result->sue)<> 0) {
                            $reintegro = Reimbursement::where('month_year', '=', Carbon::createFromDate(Util::formatYear($result->a_o), Util::zero($result->mes), 1)->toDateString())
                                                ->where('affiliate_id', '=', $afiliado->id)->first();
                            if (!$reintegro) {

                                $reintegro = new Reimbursement;
                                $reintegro->user_id = 1;
                                $reintegro->affiliate_id = $afiliado->id;
                                $reintegro->month_year = $gest;
                                $reintegro->base_wage = Util::decimal($result->sue);
                                $reintegro->seniority_bonus = Util::decimal($result->cat);
                                $reintegro->study_bonus = Util::decimal($result->est);
                                $reintegro->position_bonus = Util::decimal($result->carg);
                                $reintegro->border_bonus = Util::decimal($result->fro);
                                $reintegro->east_bonus = Util::decimal($result->ori);
                                $reintegro->gain = Util::decimal($result->gan);
                                $reintegro->payable_liquid = Util::decimal($result->pag);
                                $reintegro->quotable = (FLOAT)$reintegro->base_wage + (FLOAT)$reintegro->seniority_bonus + (FLOAT)$reintegro->study_bonus + (FLOAT)$reintegro->position_bonus + (FLOAT)$reintegro->border_bonus + (FLOAT)$reintegro->east_bonus;
                                $reintegro->total = Util::decimal($result->mus);
                                if ($reintegro->base_wage) {
                                    $reintegro->retirement_fund = $reintegro->base_wage * $por_apor->retirement_fund / $por_apor->rate_active;
                                    $reintegro->mortuary_aid = $reintegro->base_wage * $por_apor->mortuary_aid / $por_apor->rate_active;
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
