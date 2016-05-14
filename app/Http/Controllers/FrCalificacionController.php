<?php

namespace Muserpol\Http\Controllers;

use Illuminate\Http\Request;

use Muserpol\Http\Requests;
use Muserpol\Http\Controllers\Controller;

use DB;
use Auth;
use Validator;
use Session;
use Datatables;
use Carbon\Carbon;
use Muserpol\Helper\Util;

use Muserpol\Calificacion;
use Muserpol\Afiliado;
use Muserpol\Aporte;
use Muserpol\Departamento;
use Muserpol\Conyuge;
use Muserpol\Solicitante;

class FrCalificacionController extends Controller
{
    public function getData($afid){

        $afiliado = Afiliado::idIs($afid)->first();

        $conyuge = Conyuge::where('afiliado_id', '=', $afid)->first();
        if (!$conyuge) { $conyuge = new Conyuge; }

        $solicitante = Solicitante::where('afiliado_id', '=', $afid)->first();
        if (!$solicitante) { $solicitante = new Solicitante; }

        $calificacion = FrCalificacion::where('afiliado_id', '=', $afid)->first();


        if (!$calificacion) {
            $calificacion = new Calificacion;
            $calificacion->afiliado_id = $afiliado->id;
        }
        $calificacion->user_id = Auth::user()->id;
        $calificacion->fech_emi = Carbon::now();
        $calificacion->fech_ini_pcot = $afiliado->getData_fech_ini_Reco_print();
        $calificacion->fech_fin_pcot = $afiliado->getData_fech_fin_Reco_print();
        
        $calificacion->total_cot = 0;
        $calificacion->total_cot_adi = 0;
        $calificacion->subtotal_fr = 0;
        $calificacion->rendimiento = 0;

        $calificacion->save();   

        if ($afiliado->depa_dir_id) {
            $afiliado->depa_dir = Departamento::select('name')->where('id', '=', $afiliado->depa_dir_id)->firstOrFail()->name;
        }else
        {
            $afiliado->depa_dir = ""; 
        }

        $lastAporte = Aporte::afiliadoId($afiliado->id)->orderBy('gest', 'desc')->first();
        
        $afiliado->fech_ini_apor = $afiliado->fech_ing;
        $afiliado->fech_fin_apor = $lastAporte->gest;

        $consulta = DB::table('afiliados')
                ->select(DB::raw('SUM(aportes.cot) as cotizable, SUM(aportes.fr) as fr, SUM(aportes.sv) as sv'))
                ->leftJoin('aportes', 'afiliados.id', '=', 'aportes.afiliado_id')
                ->where('afiliados.id', '=', $afiliado->id)
                ->get();

        foreach ($consulta as $item) {
            $cotizable = $item->cotizable;
            $fon = $item->fr;
            $sv = $item->sv;

        }

        $data = array(
            'afiliado' => $afiliado,
            'calificacion' => $calificacion,
            'conyuge' => $conyuge,
            'solicitante' => $solicitante,
            'cotizable' => $cotizable,
            'fon' => $fon,
            'date' => date('Y-m-d')
        );
        return $data;
    }

    public function ViewCalif_fr($afid)
    {
        return view('calificacion.view_fr', self::getData($afid));
    }

    public function pdf_calif_fr($afid) 
    {
        $data = $this->getData($afid);
        $afiliado = $data['afiliado'];
        $calificacion = $data['calificacion'];
        $conyuge = $data['conyuge'];
        $titular = $data['titular'];
        $cotizable = Util::formatMoney($data['cotizable']);        
        $fon = Util::formatMoney($data['fon']);

        $date = Util::getfulldate(date('Y-m-d'));
        $view =  \View::make('print.calificacion.calif_fr', compact('afiliado', 'calificacion', 'conyuge', 'titular', 'date', 'cotizable', 'fon'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $name_input = $afiliado->id ."-" . $afiliado->pat ."-" . $afiliado->mat ."-" . $afiliado->nom ."-" . $afiliado->ci;
        $pdf->loadHTML($view)->setPaper('letter')->save('pdf/' . $name_input . '.pdf');
        return $pdf->stream('calif');
    }
}
