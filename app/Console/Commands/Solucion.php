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


class Solucion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'solucion';

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
                        
                        $var = explode(" ", $result->name);

                        $afi[$i]=$var;

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

                        $sheet->row(1, array('PRIMER NOMBRE', 'APELLIDO PATERNO', 'APELLIDO MATERNO'));
                        
                        foreach ($afi as $item) {
                            $sheet->row($i, array($item[0], $item[1], $item[2]));
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
