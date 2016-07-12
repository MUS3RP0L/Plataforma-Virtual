<?php

namespace Muserpol\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

use Maatwebsite\Excel\Facades\Excel;
use Muserpol\Helper\Util;
use Carbon\Carbon;

use Muserpol\Affiliate;
use Muserpol\Breakdown;
use Muserpol\Degree;
use Muserpol\Category;
use Muserpol\Unit;
use Muserpol\Contribution;

class ImportPayroll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'import:payroll';

    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'Import Payroll provided by General Command';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
   
    public function handle()
    {   
        global $NewAffi, $UpdateAffi, $NewContri, $Progress, $FolderName, $Date;

        $password = $this->ask('Enter the password');
        
        if ($password == ACCESS) {

            $FolderName = $this->ask('Enter the name of the folder you want to import');

            if ($this->confirm('Are you sure to import the folder "' . $FolderName . '" ? [y|N]') && $FolderName) {
               
                ini_set('upload_max_filesize', '99999M');
                ini_set('post_max_size', '99999M');
                ini_set('max_execution_time', '-1');
                ini_set('max_input_time', '-1');
                ini_set('memory_limit', '-1');
                set_time_limit('-1');

                $time_start = microtime(true);
                $this->info("Importing...\n");
                $Progress = $this->output->createProgressBar();
                $Progress->setFormat("%current%/%max% [%bar%] %percent:3s%%");                      

                Excel::batch('public/file_to_import/' . $FolderName . '/', function($rows, $file) {   
                
                    $rows->each(function($result) {

                        global $NewAffi, $UpdateAffi, $NewContri, $Progress, $FolderName, $Date;
                        ini_set('upload_max_filesize', '99999M');
                        ini_set('post_max_size', '99999M');
                        ini_set('max_execution_time', '-1');
                        ini_set('max_input_time', '-1');
                        ini_set('memory_limit', '-1');
                        set_time_limit('-1');

                        switch ($FolderName) {
                            
                            case 'c1':
                                $first_name = Util::FirstName($result->nom);
                                $second_name = Util::SecondName($result->nom);
                                $birth_date = Util::dateDDMMAA($result->nac);
                                $date_entry = Util::dateDDMMAA($result->ing);
                            break;

                            case 'c2':
                                $first_name = Util::FirstName($result->nom);
                                $second_name = Util::SecondName($result->nom);
                                $birth_date = Util::dateAADDMM($result->nac);
                                $date_entry = Util::dateAADDMM($result->ing);                                 
                            break;

                            case 'c2a':
                                $first_name = Util::FirstName($result->nom);
                                $second_name = Util::SecondName($result->nom);
                                $birth_date = Util::dateAADDMM($result->nac);
                                $date_entry = Util::dateAADDMM($result->ing);                                
                            break;

                            case 'c3':
                                $first_name = Util::FirstName($result->nom);
                                $second_name = Util::SecondName($result->nom);
                                $birth_date = Util::dateAAMMDD($result->nac);
                                $date_entry = Util::dateAAMMDD($result->ing);  
                            break;

                            case 'c4':
                                $first_name = $result->nom;
                                $second_name = $result->nom2;
                                $birth_date = Util::dateAAMMDD($result->nac);
                                $date_entry = Util::dateAAMMDD($result->ing);                                 
                            break;

                            case 'c5':
                                $first_name = $result->nom;
                                $second_name = $result->nom2;
                                $birth_date = Util::dateDDMMAA($result->nac);
                                $date_entry = Util::dateDDMMAA($result->ing);                                 
                            break;

                            default:
                                $first_name = $result->nom;
                                $second_name = $result->nom2;
                                $birth_date = Util::date($result->nac);
                                $date_entry = Util::date($result->ing);    
                        } 
                                            
                        //obtiene fecha/gestion(año, mes, dia 1), con los parametros a_o y mes de excel
                        $month_year = Carbon::createFromDate(Util::formatYear($result->a_o), Util::zero($result->mes), 1)->toDateString();
                        $Date = Util::zero($result->mes) . "-" . Util::formatYear($result->a_o);
                        //busqueda del desglose
                        if (is_null($result->desg)) {$result->desg = 0;}
                        $breakdown_id = Breakdown::select('id')->where('code', $result->desg)->first()->id;
                        
                        //busqueda de unidad
                        if ($breakdown_id == 1) {
                            $unit_id = 20;
                        }else{
                            $unit_id = Unit::select('id')->orwhere('breakdown_id', $breakdown_id)->where('code', $result->uni)->first()->id;
                        }

                        if($result->niv && $result->gra) {
                            if ($result->niv == '04' && $result->gra == '15'){$result->niv = '03';}
                            $degree_id = Degree::select('id')->where('code_level', $result->niv)->where('code_degree', $result->gra)->first()->id;
                        }

                        $category_id = Category::select('id')->where('percentage', Util::CalcCategory(Util::decimal($result->cat),Util::decimal($result->sue)))->first()->id;
                        
                        //busqueda del afiliado
                        $affiliate = Affiliate::where('identity_card', '=', Util::zero($result->car))->first();

                        if (!$affiliate) {

                            $affiliate = Affiliate::where('last_name', '=', $result->pat)->where('mothers_last_name', '=', $result->mat)
                                                ->where('birth_date', '=', $birth_date)->where('date_entry', '=', $date_entry)->first();
                            
                            if (!$affiliate) {

                                $affiliate = new Affiliate;
                                $affiliate->gender = $result->sex;
                                $affiliate->afp = Util::getAfp($result->afp);
                                $NewAffi ++;

                            }
                            else{$UpdateAffi ++;}
                        }
                        else{$UpdateAffi ++;}

                        $affiliate->identity_card = Util::zero($result->car);
                        $affiliate->change_date = $month_year;
                        
                        switch ($result->desg) {
                            
                            case '1'://Disponibilidad
                                $affiliate->affiliate_state_id = 3;
                            break;
                            case '3'://Comisión
                                $affiliate->affiliate_state_id = 2;
                            break;
                            default://Servicio
                                $affiliate->affiliate_state_id = 1;
                        }  

                        switch ($result->desg) {
                            case '5': //Batallón
                                $affiliate->affiliate_type_id = 2;
                            break;
                            default://Comando
                                $affiliate->affiliate_type_id = 1;
                        }     

                        if ($result->uni) {
                            $affiliate->unit_id = $unit_id; 
                        }
                        if ($result->gra) {          
                            $affiliate->degree_id = $degree_id;
                        }         

                        $affiliate->category_id = $category_id;       
                        $affiliate->user_id = 1;
                        $affiliate->last_name = $result->pat;
                        $affiliate->mothers_last_name = $result->mat;
                        $affiliate->first_name = $first_name;
                        $affiliate->second_name = $second_name;
                        $affiliate->surname_husband = $result->apes;
                        $affiliate->civil_status = $result->eciv;
                        $affiliate->nua = $result->nua;
                        $affiliate->item = $result->item;
                        $affiliate->birth_date = $birth_date;
                        $affiliate->date_entry = $date_entry;
                        $affiliate->registration = Util::CalcRegistration($birth_date, $affiliate->last_name, $affiliate->mothers_last_name, $affiliate->first_name, $affiliate->gender);                           
                        $affiliate->save();

                        if (Util::decimal($result->sue)<> 0) {

                            $contribution = Contribution::where('month_year', '=', $month_year)
                                                        ->where('affiliate_id', '=', $affiliate->id)->first();
                            if (!$contribution) {

                                $contribution = new Contribution;
                                $contribution->user_id = 1;
                                $contribution->contribution_type_id = 1;

                                $contribution->affiliate_id = $affiliate->id;
                                $contribution->month_year = $month_year;
                                if ($result->uni) {
                                    $contribution->unit_id = $unit_id; 
                                }
                                if ($result->gra) {          
                                    $contribution->degree_id = $degree_id;
                                }
                                $contribution->category_id = $category_id;
                                $contribution->item = $result->item;
                                $contribution->base_wage = Util::decimal($result->sue);
                                $contribution->seniority_bonus = Util::decimal($result->cat);
                                $contribution->study_bonus = Util::decimal($result->est);
                                $contribution->position_bonus = Util::decimal($result->carg);
                                $contribution->border_bonus = Util::decimal($result->fro);
                                $contribution->east_bonus = Util::decimal($result->ori);
                                $contribution->public_security_bonus = Util::decimal($result->bseg);
                                $contribution->deceased = $result->dfu;
                                $contribution->natality = $result->nat;
                                $contribution->lactation = $result->lac;
                                $contribution->prenatal = $result->pre;
                                $contribution->subsidy = Util::decimal($result->sub);
                                $contribution->gain = Util::decimal($result->gan);
                                $contribution->payable_liquid = Util::decimal($result->pag);
                                $contribution->quotable = (FLOAT)$contribution->base_wage +
                                                          (FLOAT)$contribution->seniority_bonus + 
                                                          (FLOAT)$contribution->study_bonus + 
                                                          (FLOAT)$contribution->position_bonus + 
                                                          (FLOAT)$contribution->border_bonus + 
                                                          (FLOAT)$contribution->east_bonus;

                                $contribution->total = Util::decimal($result->mus);
                                $percentage = round(($contribution->total / $contribution->quotable) * 100, 1);
                                if ($percentage == 2.5) {
                                    $contribution->retirement_fund = $contribution->total * 1.85 / $percentage;
                                    $contribution->mortuary_quota = $contribution->total * 0.65 / $percentage;
                                }
                                $contribution->save();
                                $NewContri ++;
                            }
                        }

                        $Progress->advance();

                    });

                });

                $time_end = microtime(true);

                $execution_time = ($time_end - $time_start)/60;
                
                $TotalAffi = $NewAffi + $UpdateAffi;
                $TotalNewAffi = $NewAffi ? $NewAffi : "0";
                $TotalUpdateAffi = $UpdateAffi ? $UpdateAffi : "0";
                $TotalAffi = $TotalAffi ? $TotalAffi : "0";
                $TotalNewContri = $NewContri ? $NewContri : "0";

                $Progress->finish();
            
                $this->info("\n\nReport $Date:\n\n
                    $TotalNewAffi new affiliates.\n 
                    $TotalUpdateAffi affiliates successfully updated.\n 
                    Total $TotalAffi affiliates.\n 
                    Total $TotalNewContri entered contributions.\n 
                    Execution time $execution_time [minutes].\n");
                
                \Storage::disk('local')->put('ImportPayroll_'. $Date.'.txt', "\n\nReport:\n\n
                    $TotalNewAffi new affiliates.\n 
                    $TotalUpdateAffi affiliates successfully updated.\n 
                    Total $TotalAffi affiliates.\n 
                    Total $TotalNewContri entered contributions.\n 
                    Execution time $execution_time [minutes].\n");
            }
        }
        else{
            $this->error('Incorrect password!');
        }
    }
}
