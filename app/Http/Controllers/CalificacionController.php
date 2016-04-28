<?php

namespace Muserpol\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Session;
use Muserpol\Http\Requests;
use Muserpol\Http\Controllers\Controller;
use Muserpol\Afiliado;
use Muserpol\Calificacion;
use Muserpol\Municipio;
use Muserpol\Titular;
use Muserpol\Conyuge;
use Datatables;
use Muserpol\Helper\Util;
use Carbon\Carbon;
use Illuminate\Support\Collection;

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
    public function ViewCalif($afid)
    {
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

        return view('calificacion.view', $data);
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
