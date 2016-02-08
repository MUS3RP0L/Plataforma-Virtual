<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Afiliado;
use App\Aporte;
use App\Helper\Util;

class ImportController extends Controller
{
    public function import(Request $request)
    {

    	set_time_limit(360);

    	$reader = $request->file('image');
        $filename = $reader->getRealPath();

    	Excel::selectSheets('Hoja1')->filter('chunk')->load($filename,$reader)->chunk(250, function($results) {
			
			foreach ($results as $result) {
				
				set_time_limit(360);

				$carnet = Util::zero($result->car);

				$afiliado = Afiliado::where('ci', '=', $carnet)->first();
				
				if ($afiliado === null) {

					$afiliado = new Afiliado;
	        		$afiliado->ci = $carnet;
	        		$afiliado->pat = $result->pat;
	        		$afiliado->mat = $result->mat;
	        		$afiliado->nom = $result->nom;
	        		$afiliado->nom2 = $result->nom2;
	        		$afiliado->ap_esp = $result->apes;
	        		$afiliado->est_civ = $result->eciv;
	        		$afiliado->sex = $result->sex;
	        		// $afiliado->matri = ;
	        		$afiliado->fech_nac = Util::date($result->nac);
	        		$afiliado->fech_ing = Util::date($result->ing);
	       	 		$afiliado->save();
				}

				$aporte = Aporte::where('mes', '=', $result->mes)
								->where('anio', '=', $result->a_o)
								->where('afiliado_id', '=', $afiliado->id)->first();

				if ($aporte === null) {

					$aporte = new Aporte;
					$aporte->afiliado_id = $afiliado->id;
					$aporte->mes = $result->mes;
					$aporte->anio = $result->a_o;
					$aporte->uni = $result->uni;
					$aporte->desg = $result->desg;
					$aporte->niv = $result->niv;
					$aporte->gra = $result->gra;
					$aporte->item = $result->item;
					// $aporte->cat = ;
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
					// $aporte->cot = ;
					// $aporte->cot_adi = ;
					$aporte->mus = Util::decimal($result->mus);
	     			$aporte->save();
	     		}
      		}

		});

		return view('import.import_select');
    }

    public function importSelect()
    {
		return view('import.import_select');
    }
}
