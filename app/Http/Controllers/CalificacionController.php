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
use Muserpol\Titular;
use Muserpol\Conyuge;

class CalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getData($afid){

        $afiliado = Afiliado::idIs($afid)->first();

        $calificacion = Calificacion::where('afiliado_id', '=', $afid)->first();
        if (!$calificacion) {
            $calificacion = new Calificacion;
            $calificacion->type = "fr";
        }
        $calificacion->user_id = Auth::user()->id;
        $calificacion->afiliado_id = $afiliado->id;
        $calificacion->fech_emi = Carbon::now();
        $calificacion->fech_ini_pcot = $afiliado->getData_fech_ini_Reco_print();
        $calificacion->fech_fin_pcot = $afiliado->getData_fech_fin_Reco_print();

        $calificacion->save();
        

        $conyuge = Conyuge::where('afiliado_id', '=', $afid)->first();
        if (!$conyuge) {  
            $conyuge = new Conyuge;
        }

        $titular = Titular::where('afiliado_id', '=', $afid)->first();
        if (!$titular) {
            $titular = new Titular;
        }

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
                ->select(DB::raw('SUM(aportes.cot) as cotizable, SUM(aportes.fr) as fr'))
                ->leftJoin('aportes', 'afiliados.id', '=', 'aportes.afiliado_id')
                ->where('afiliados.id', '=', $afiliado->id)
                ->get();

        foreach ($consulta as $item) {
            $cotizable = $item->cotizable;
            $fon = $item->fr;

        }

        $data = array(
            'afiliado' => $afiliado,
            'calificacion' => $calificacion,
            'conyuge' => $conyuge,
            'titular' => $titular,
            'cotizable' => $cotizable,
            'fon' => $fon,
            'date' => date('Y-m-d')
        );
        return $data;
    }
    
    public function ViewCalif_fr($afid)
    {
        $data = $this->getData($afid);
        $afiliado = $data['afiliado'];
        $calificacion = $data['calificacion'];
        $conyuge = $data['conyuge'];
        $titular = $data['titular'];        
        $cotizable = $data['cotizable'];        
        $fon = $data['fon'];        

        $data = array(
            'afiliado' => $afiliado,
            'calificacion' => $calificacion,
            'conyuge' => $conyuge,
            'titular' => $titular,
            'cotizable' => $cotizable,
            'fon' => $fon,
            'date' => date('Y-m-d')
        );

        return view('calificacion.view_fr', $data);
    }

    public function pdf_calif_fr($afid) 
    {
        $data = $this->getData($afid);
        $afiliado = $data['afiliado'];
        $conyuge = $data['conyuge'];
        $titular = $data['titular'];

        $date = date('Y-m-d');
        $view =  \View::make('print.calificacion.calif_fr', compact('afiliado','conyuge', 'titular', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $name_input = $afiliado->id ."-" . $afiliado->pat ."-" . $afiliado->mat ."-" . $afiliado->nom ."-" . $afiliado->ci;
        $pdf->loadHTML($view)->setPaper('letter')->save('pdf/' . $name_input . '.pdf');
        return $pdf->stream('calif');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
