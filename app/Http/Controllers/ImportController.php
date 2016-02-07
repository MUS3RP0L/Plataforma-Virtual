<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Afiliado;
use App\Aporte;

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
				
				$timestamp_nac_day = substr($afiliado->nac, 0, 2);
				$timestamp_nac_month = substr($afiliado->nac, 2, 2);
				$timestamp_nac_year = substr($afiliado->nac, 4);
				$timestamp_nac = $timestamp_nac_year ."-". $timestamp_nac_month ."-". $timestamp_nac_day;

				$timestamp_ing_day = substr($afiliado->ing, 0, 2);
				$timestamp_ing_month = substr($afiliado->ing, 2, 2);
				$timestamp_ing_year = substr($afiliado->ing, 4);
				$timestamp_ing = $timestamp_ing_year ."-". $timestamp_ing_month ."-". $timestamp_ing_day;
				
			    Afiliado::create([
     					// 1 CAR
						'ci' => (int) $afiliado->car,
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
						/* 'matri',*/
						// 9 NAC
						'fech_nac' => date($timestamp_nac),
						// 10 ING
						'fech_ing' => date($timestamp_ing)
     			]);
     			
      		}
		});


		Excel::selectSheets('Hoja1')->filter('chunk')->load($filename,$reader)->chunk(250, function($results) {
			
			foreach ($results as $aporte) {
				
				set_time_limit(360);
				$ci = (int) $aporte->car;
				$afiliadoModel = Afiliado::where('ci', $ci)->first();
				
				$sueMon = substr($aporte->sue, 0, -2);
				$sueDeci = substr($aporte->sue, -1);
				$sue = $sueMon . "." . $sueDeci;
						
			    Aporte::create([
     					// 1 CAR
			    		'afiliado_id' => $afiliadoModel->id,
						'mes' => $aporte->mes,
						'anio' => $aporte->a_o,
						'uni' => $aporte->uni,
						'desg' => $aporte->desg,
						'niv' => $aporte->niv,
						'grad' => $aporte->grad,
						'item' => $aporte->item,
						// 'cat' => $aporte->cat,
						'sue' => $sue,


     			]);
     			
      		}
		});

		return view('import.import_select');
    }




    public function importSelect()
    {
		return view('import.import_select');
    }
}
