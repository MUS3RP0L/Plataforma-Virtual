<?php

namespace Muserpol\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

use Maatwebsite\Excel\Facades\Excel;
use Muserpol\Affiliate;
use Muserpol\Reimbursement;
use Muserpol\Helper\Util;
use Carbon\Carbon;

class ImportReimbursement extends Command
{
    protected $signature = 'import:reimbursement';
    protected $description = 'Import reimbursement provided by General Command';

   
    public function handle()
    {
        global $notfounf,$newreimb, $progress, $name,$Date;
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

                        global $notfounf,$newreimb, $progress, $name,$Date;
                        ini_set('upload_max_filesize', '9999M');
                        ini_set('post_max_size', '9999M');
                        ini_set('max_execution_time', 36000);
                        ini_set('max_input_time', 36000);
                        ini_set('memory_limit', '-1');
                        set_time_limit(36000);

                        $affliate = Affiliate::where('identity_card', '=', Util::zero($result->car))->first();
                        $month_year = Carbon::createFromDate(Util::formatYear($result->a_o), Util::zero($result->mes), 1);
                        $Date = Util::zero($result->mes) . "-" . Util::formatYear($result->a_o);
                        
                        if (!$affliate) {

                            $affliate = Affiliate::where('last_name', '=', $result->pat)->where('mothers_last_name', '=', $result->mat)
                                                ->where('date_entry', '=', $result->ing)->first();
                        }
                       if($affliate)
                       {
                        if (Util::decimal($result->sue)<> 0) {
                            $reimbursement = Reimbursement::where('month_year', '=', Carbon::createFromDate(Util::formatYear($result->a_o), Util::zero($result->mes), 1)->toDateString())
                                                ->where('affiliate_id', '=', $affliate->id)->first();
                            if (!$reimbursement) {

                                $reimbursement = new Reimbursement;
                                $reimbursement->user_id = 1;
                                $reimbursement->affiliate_id = $affliate->id;
                                $reimbursement->month_year = $month_year;
                                $reimbursement->base_wage = Util::decimal($result->sue);
                                $reimbursement->seniority_bonus = Util::decimal($result->cat);
                                $reimbursement->study_bonus = Util::decimal($result->est);
                                $reimbursement->position_bonus = Util::decimal($result->carg);
                                $reimbursement->border_bonus = Util::decimal($result->fro);
                                $reimbursement->east_bonus = Util::decimal($result->ori);
                                $reimbursement->gain = Util::decimal($result->gan);
                                $reimbursement->payable_liquid = Util::decimal($result->pag);
                                $reimbursement->quotable = (FLOAT)$reimbursement->base_wage + 
                                                       (FLOAT)$reimbursement->seniority_bonus + 
                                                       (FLOAT)$reimbursement->study_bonus + 
                                                       (FLOAT)$reimbursement->position_bonus + 
                                                       (FLOAT)$reimbursement->border_bonus + 
                                                       (FLOAT)$reimbursement->east_bonus;

                                $reimbursement->total = Util::decimal($result->mus);
                                $percentage = round(($reimbursement->total / $reimbursement->quotable) * 100, 1);
                                if ($reimbursement->base_wage){
                                    $reimbursement->retirement_fund = $reimbursement->total * 1.85 / $percentage;
                                    $reimbursement->mortuary_quota = $reimbursement->total * 0.65 / $percentage;
                                }
                                $reimbursement->save();
                                $newreimb ++;
                            }
                        }
                        }
                        else{$notfounf ++;}

                        $progress->advance();
                    });

                });

                $time_end = microtime(true);

                $execution_time = ($time_end - $time_start)/60;
                
                $newreimb = $newreimb ? $newreimb : "0";
                $notfounf = $notfounf ? $notfounf : "0";

                $progress->finish();
            
                $this->info("\n\nReport $Date:\n\n
                    $newreimb new reimbursements.\n
                    $notfounf affiliate not found .\n 
                    Execution time $execution_time [minutes].\n");
               
                \Storage::disk('local')->put($Date.'.txt', "\n\nReport:\n\n
                   $newreimb new reimbursements.\n
                    $notfounf affiliate not found .\n 
                    Execution time $execution_time [minutes].\n");
            }
        }
        else{
            $this->error('Incorrect password!');
        }
    }



}
