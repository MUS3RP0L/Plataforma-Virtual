<?php

namespace Muserpol\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use Validator;
use Muserpol\Http\Requests;
use Muserpol\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Muserpol\Afiliado;
use Muserpol\Aporte;
use Muserpol\Helper\Util;

$countAfi = 0;
$countApor = 0;

class ImportController extends Controller
{

    public function import(Request $request)
    {
    	global $countAfi, $countApor;

		ini_set('upload_max_filesize', '700M');
		ini_set('post_max_size', '700M');
		ini_set('max_execution_time', 36000);
		ini_set('max_input_time', 36000);
		ini_set("memory_limit","700M");
    	set_time_limit(36000);

    	$reader = $request->file('archive');
        $filename = $reader->getRealPath();

        Excel::selectSheetsByIndex(0)->load($filename, function($reader) {

			$count = 0;
			$col = array('car', 'pat', 'mat', 'nom', 'nom2', 'apes', 'eciv', 'sex', 'nac', 'ing', 'mes', 'a_o', 'uni', 'desg', 
						'niv', 'gra', 'item', 'sue', 'cat', 'est', 'carg', 'fro', 'ori', 'bseg', 'dfu', 'nat', 'lac', 'pre', 'sub', 'gan', 'afp', 'pag', 'nua', 'mus');

		 	$results = $reader->select($col)->first();
			 
			foreach ($results as $nombre => $valor) {
				if (in_array($nombre, $col)) {
					$count ++;
				}
			}	

			if ($count < count($col))
			{
				$message = "Falta Columnas, favor Verificar el Archivo";
				Session::flash('message', $message);
				return redirect('importar_archivo');
				break;
			}
		});

			$col = array('car', 'pat', 'mat', 'nom', 'nom2', 'apes', 'eciv', 'sex', 'nac', 'ing', 'mes', 'a_o', 'uni', 'desg', 
						'niv', 'gra', 'item', 'sue', 'cat', 'est', 'carg', 'fro', 'ori', 'bseg', 'dfu', 'nat', 'lac', 'pre', 'sub', 'gan', 'afp', 'pag', 'nua', 'mus');


     	Excel::selectSheetsByIndex(0)->filter('chunk')->select($col)->load($filename,$reader)->chunk(500, function($results) {

     		global $countAfi, $countApor;

			$col = array('car', 'pat', 'mat', 'nom', 'nom2', 'apes', 'eciv', 'sex', 'nac', 'ing', 'mes', 'a_o', 'uni', 'desg', 
						'niv', 'gra', 'item', 'sue', 'cat', 'est', 'carg', 'fro', 'ori', 'bseg', 'dfu', 'nat', 'lac', 'pre', 'sub', 'gan', 'afp', 'pag', 'nua', 'mus');

			foreach ($results as $result) {
				
				set_time_limit(36000);

				$carnet = Util::zero($result->car);

				$afiliado = Afiliado::where('ci', '=', $carnet)->first();
				
				if ($afiliado === null) {
	
					$afiliado = new Afiliado;
	        		$afiliado->user_id = Auth::user()->id;
	        		
	        		if(Util::decimal($result->sue) == 0){
	        			$afiliado->afi_state_id = 2;
	        		}
	        		else{
	        			$afiliado->afi_state_id = 1;
	        		}
	        		
	        		$afiliado->ci = $carnet;
	        		$afiliado->pat = $result->pat;
	        		$afiliado->mat = $result->mat;
	        		$afiliado->nom = $result->nom;
	        		$afiliado->nom2 = $result->nom2;
	        		$afiliado->ap_esp = $result->apes;
	        		$afiliado->est_civ = $result->eciv;
	        		$afiliado->sex = $result->sex;
	        		$afiliado->afp = Util::getAfp($result->afp);
	        		$afiliado->matri = Util::calcMatri($result->nac, $afiliado->pat, $afiliado->mat, $afiliado->nom, $afiliado->sex);
	        		$afiliado->fech_nac = Util::date($result->nac);
	        		$afiliado->fech_ing = Util::date($result->ing);
	        		$afiliado->nua = $result->nua;
	        		
	       	 		$afiliado->save();
	       	 		$countAfi ++;
				}

				$aporte = Aporte::where('mes', '=', $result->mes)
								->where('anio', '=', $result->a_o)
								->where('afiliado_id', '=', $afiliado->id)->first();

				if ($aporte === null) {

					$aporte = new Aporte;
					$aporte->user_id = Auth::user()->id;
					$aporte->afiliado_id = $afiliado->id;
					$aporte->mes = $result->mes;
					$aporte->anio = $result->a_o;
					$aporte->uni = $result->uni;
					$aporte->desg = $result->desg;
					$aporte->niv = $result->niv;
					$aporte->gra = $result->gra;
					$aporte->item = $result->item;

					$aporte->sue = Util::decimal($result->sue);
					$aporte->b_ant = Util::decimal($result->cat);
					$aporte->cat = Util::calcCat($aporte->b_ant,$aporte->sue);
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
	     			$aporte->save();
	     			$countApor ++;
	     		}
      		}

		});

      	$message = "Se realizaron " . $countAfi . " registros de Afiliados Nuevos y " . $countApor . " en Planillas";

        Session::flash('message', $message);

		return redirect('importar_archivo');
    }

    public function importSelect()
    {
		return view('import.import_select');
    }
}
