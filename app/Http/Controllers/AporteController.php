<?php

namespace Muserpol\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use Validator;
use Session;
use Muserpol\Http\Requests;
use Muserpol\Http\Controllers\Controller;
use Muserpol\Afiliado;
use Muserpol\Aporte;
use Datatables;
use Muserpol\Helper\Util;

class AporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('aportes.index');
    }


    public function RegPagoData(Request $request)
    {   
        $afiliado = Afiliado::idIs($request->id)->firstOrFail();

        $gestiones = new Collection;

        $from = Carbon::parse($afiliado->fech_ing);

        $to = Carbon::now();
        
        $to->diffInHours($from);

        for ($i=$from->year; $i <= $to->year ; $i++) { 
            
            $base = array();
            $mes = array();

            for ($j=1; $j <= 12; $j++) { 

                $aportes = Aporte::select(['gest'])
                                    ->where('afiliado_id', $request->id)
                                    ->where('gest', '=',Carbon::createFromDate($i, $j, 1)->toDateString())
                                    ->first();   
     
                if ($aportes) {
                    $mes["m".$j] = 1;
                }else{
                   $mes["m".$j] = 0;
                }
                $base = array_merge($base, $mes);
            }
            $year = array('year'=> $i);

            $gestiones->push(
               array_merge($year, $base)
            );
           // $gestiones[] = array_merge($year, $base);

        }

        // return $gestiones;
        return Datatables::of($gestiones)
                ->addColumn('action', function ($afiliado) { 
                    return  '
                            <a href="afiliado" ><i class="glyphicon glyphicon-zoom-in"></i></a>';})
                ->make(true);
        // return  $to->diffInYears($from);

        // return Datatables::of($gestiones)
                        // ->editColumn('anio', function ($aportes) { return $aportes->mes . "-" . $aportes->anio; })
                        // ->editColumn('grado_id', function ($aportes) { return $aportes->grado->niv . "-" . $aportes->grado->grad; })
                        // ->editColumn('unidad_id', function ($aportes) { return $aportes->unidad->cod; })
                        // ->editColumn('mus', function ($aportes) { return Util::formatMoney($aportes->mus); })
                        // ->make(true);

    }

    public function aportesData(Request $request)
    {   

        $aportes = Aporte::select(['id', 'mes', 'anio', 'grado_id', 'unidad_id', 'item', 'sue',
                             'b_ant', 'b_est', 'b_car', 'b_fro', 'b_ori', 'b_seg',
                             'dfu', 'nat', 'lac', 'pre', 'sub', 'gan', 'cot', 'mus' ])->where('afiliado_id', $request->id);

        return Datatables::of($aportes)
                        ->editColumn('anio', function ($aportes) { return $aportes->mes . "-" . $aportes->anio; })
                        ->editColumn('grado_id', function ($aportes) { return $aportes->grado->niv . "-" . $aportes->grado->grad; })
                        ->editColumn('unidad_id', function ($aportes) { return $aportes->unidad->cod; })
                        ->editColumn('sue', function ($aportes) { return Util::formatMoney($aportes->sue); })
                        ->editColumn('b_ant', function ($aportes) { return Util::formatMoney($aportes->b_ant); })
                        ->editColumn('b_est', function ($aportes) { return Util::formatMoney($aportes->b_est); })
                        ->editColumn('b_car', function ($aportes) { return Util::formatMoney($aportes->b_car); })
                        ->editColumn('b_fro', function ($aportes) { return Util::formatMoney($aportes->b_fro); })
                        ->editColumn('b_ori', function ($aportes) { return Util::formatMoney($aportes->b_ori); })
                        ->editColumn('b_seg', function ($aportes) { return Util::formatMoney($aportes->b_seg); })
                        ->editColumn('gan', function ($aportes) { return Util::formatMoney($aportes->gan); })
                        ->editColumn('cot', function ($aportes) { return Util::formatMoney($aportes->cot); })
                        ->editColumn('mus', function ($aportes) { return Util::formatMoney($aportes->mus); })
                        ->addColumn('fon', function ($aportes) { return Util::calcFon($aportes->mus); })
                        ->addColumn('vid', function ($aportes) { return Util::calcVid($aportes->mus); })
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
