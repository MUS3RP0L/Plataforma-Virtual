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

use Muserpol\AportePago;
use Muserpol\Afiliado;


class AportePagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('aportes.pagos.index');
    }

    public function AportePagoData(Request $request)
    {   

        $aporte_pagos = AportePago::select(['id', 'afiliado_id', 'created_at', 'total']);

        return Datatables::of($aporte_pagos)
                        ->addColumn('status', function ($aporte_pagos) { return $aporte_pagos->fech_pago ? 'Pagado' : 'Pendiente'; })
                        ->addColumn('afiliado', function ($aporte_pagos) { return $aporte_pagos->afiliado->getTittleName(); })
                        ->addColumn('fecha_emision', function ($aporte_pagos) { return Util::getdateabre($aporte_pagos->created_at); })
                        ->addColumn('total_aporte', function ($aporte_pagos) { return Util::formatMoney($aporte_pagos->total); })
                        ->addColumn('action', function ($aporte_pagos) { return  '
                        <div class="btn-group" style="margin:-3px 0;">
                            <a href="aportepago/' . $aporte_pagos->id . '" class="btn btn-success btn-raised btn-sm"><i class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="" data-target="#" class="btn btn-success btn-raised btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li role="separator" class="divider"></li>
                            </ul>
                        </div>';})
                        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $aportePago = AportePago::idIs($id)->first();
        $afiliado = Afiliado::idIs($aportePago->afiliado_id)->first();

        $data = array(
            'aportePago' => $aportePago,
            'afiliado' => $afiliado,
        );
        
        return view('aportes.pagos.show', $data);
    }

    public function PrintAportePago($id) 
    {
        $aportePago = AportePago::first();
        $aportePago->date = Util::getfulldate($aportePago->created_at);

        $view = \View::make('print_pago.pagosaporte.show', compact('aportePago'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $name_input = $aportePago->id;
        $pdf->loadHTML($view)->setPaper('letter')->save('pdf/fondo_retiro/ventanilla/' . $name_input . '.pdf');
        return $pdf->stream();
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
