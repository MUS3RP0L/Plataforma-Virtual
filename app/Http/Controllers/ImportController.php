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
    	
    	$input=$request->file('image');
        $filename=$input->getRealPath();

    	Excel::filter('chunk')->load($filename, $input)->chunk(5000, function($reader) {

     		foreach ($reader as $afiliado) {
     			Afiliado::create([
     				'ci' => $afiliado->ci,
     				'pat' =>$afiliado->pat,
     				'mat' =>$afiliado->mat
     			]);
      		}
		});
		return afiliado::all();
    }




    public function importSelect()
    {
		return view('import.import_select');
    }
}
