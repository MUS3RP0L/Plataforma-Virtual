<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Afiliado;

class ImportController extends Controller
{
    public function import(Request $request)
    {

    	set_time_limit(360);

    	$reader = $request->file('image');
        $filename = $reader->getRealPath();

    	Excel::selectSheets('Hoja1')->filter('chunk')->load($filename,$reader)->chunk(250, function($results) {
			
			foreach ($results as $afiliado) {
				
				set_time_limit(360);

			    Afiliado::create([
     					// 1 CAR
						'ci' => $afiliado->car,
						// 2 PAT
						'pat' => $afiliado->pat,
						// 3 MAT
						'mat' => $afiliado->mat,
						// 4 NOM
						'nom' => $afiliado->nom,
						// 5 NOM2
						'nom2' => $afiliado->nom2,
						// 6 APES
						'ap_esp' => $afiliado->apes,
						// 7 ECIV
						'est_civ' => $afiliado->eciv,
						// 8 SEX
						'sex' => $afiliado->sex,
						//11 Calcular
						// 'matri',
						// 9 NAC
						// 'fech_nac' => $afiliado->NAC,
						// 10 ING
						// 'fech_ing' => $afiliado->ING

     			]);
     			
      		}
		});
    	
  //   	$input=$request->file('image');
  //       $filename=$input->getRealPath();

  //   	// Excel::filter('chunk')->load($filename, $input)->chunk(5000, function($reader) {
  //   	Excel::filter('chunk')->load('comando.xlsx')->chunk(5000, function($reader) {

  //    		foreach ($reader as $afiliado) {
  //    			Afiliado::create([
  //    				'ci' => $afiliado->ci,
  //    				'pat' =>$afiliado->pat,
  //    				'mat' =>$afiliado->mat
  //    			]);
  //     		}
		// });
		// return afiliado::all();
		return view('import.import_select');
    }




    public function importSelect()
    {
		return view('import.import_select');
    }
}
