<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Afiliado;

class ImportController extends Controller
{
    public function import()
    {
    	Excel::load('books.csv', function($reader) {

     		foreach ($reader->get() as $afiliado) {
     			Afiliado::create([
     				'ci' => $afiliado->ci,
     				'pat' =>$afiliado->pat,
     				'mat' =>$afiliado->mat
     			]);
      		}
		});
		return afiliado::all();
    }
}