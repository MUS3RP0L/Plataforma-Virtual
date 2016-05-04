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

use Muserpol\Calificacion;
use Muserpol\Afiliado;
use Muserpol\Departamento;
use Muserpol\Titular;
use Muserpol\Conyuge;
use Muserpol\Helper\Util;

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
        }

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

        $data = array(
            'afiliado' => $afiliado,
            'calificacion' => $calificacion,
            'conyuge' => $conyuge,
            'titular' => $titular,
            'date' => date('Y-m-d')
        );
        return $data;
    }
    
    public function ViewCalif($afid)
    {
        $data = $this->getData($afid);
        $afiliado = $data['afiliado'];
        $calificacion = $data['calificacion'];
        $conyuge = $data['conyuge'];
        $titular = $data['titular'];        

        $data = array(
            'afiliado' => $afiliado,
            'calificacion' => $calificacion,
            'conyuge' => $conyuge,
            'titular' => $titular,
            'date' => date('Y-m-d')
        );

        return view('calificacion.view', $data);
    }

    public function calif($afid) 
    {
        $data = $this->getData($afid);
        $afiliado = $data['afiliado'];
        $conyuge = $data['conyuge'];
        $titular = $data['titular'];

        $date = date('Y-m-d');
        $view =  \View::make('print.calif', compact('afiliado','conyuge', 'titular', 'date'))->render();
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
