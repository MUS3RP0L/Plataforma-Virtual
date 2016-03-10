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
use Carbon\Carbon;
use Illuminate\Support\Collection;

class AporteController extends Controller
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

    public function RegAporteGest($afid)
    {
        $data = array(
            'afid' => $afid,
        );

        return view('aportes.index', $data);
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
            $all = 0;
 
            for ($j=1; $j <= 12; $j++) { 

                $aportes = Aporte::select(['gest'])->where('afiliado_id', $request->id)->where('gest', '=',Carbon::createFromDate($i, $j, 1)->toDateString())->first();   
     
                if ($aportes) {
                    $mes["m".$j] = 1;
                    $all++;
                }else{
                   $mes["m".$j] = 0;
                }

                if ($i == $from->year) {
                    if($j < $from->month){
                        $mes["m".$j] = -1;
                    }
                }

                if ($i == $to->year) {
                    if($j > $to->month){
                        $mes["m".$j] = -1;
                    }
                }

                $base = array_merge($base, $mes);
            }

            $year = array('year'=> $i);
            $gestiones->push(array_merge($year, $base));
        }

        return Datatables::of($gestiones)
                ->editColumn('m1', '<?php if($m1 === 1){ ?><i class="glyphicon glyphicon-ok"></i><?php } if($m1 === 0){?><i class="glyphicon glyphicon-minus"></i><?php } if($m1 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m2', '<?php if($m2 === 1){ ?><i class="glyphicon glyphicon-ok"></i><?php } if($m2 === 0){?><i class="glyphicon glyphicon-minus"></i><?php } if($m2 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m3', '<?php if($m3 === 1){ ?><i class="glyphicon glyphicon-ok"></i><?php } if($m3 === 0){?><i class="glyphicon glyphicon-minus"></i><?php } if($m3 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m4', '<?php if($m4 === 1){ ?><i class="glyphicon glyphicon-ok"></i><?php } if($m4 === 0){?><i class="glyphicon glyphicon-minus"></i><?php } if($m4 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m5', '<?php if($m5 === 1){ ?><i class="glyphicon glyphicon-ok"></i><?php } if($m5 === 0){?><i class="glyphicon glyphicon-minus"></i><?php } if($m5 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m6', '<?php if($m6 === 1){ ?><i class="glyphicon glyphicon-ok"></i><?php } if($m6 === 0){?><i class="glyphicon glyphicon-minus"></i><?php } if($m6 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m7', '<?php if($m7 === 1){ ?><i class="glyphicon glyphicon-ok"></i><?php } if($m7 === 0){?><i class="glyphicon glyphicon-minus"></i><?php } if($m7 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m8', '<?php if($m8 === 1){ ?><i class="glyphicon glyphicon-ok"></i><?php } if($m8 === 0){?><i class="glyphicon glyphicon-minus"></i><?php } if($m8 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m9', '<?php if($m9 === 1){ ?><i class="glyphicon glyphicon-ok"></i><?php } if($m9 === 0){?><i class="glyphicon glyphicon-minus"></i><?php } if($m9 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m10', '<?php if($m10 === 1){ ?><i class="glyphicon glyphicon-ok"></i><?php } if($m10 === 0){?><i class="glyphicon glyphicon-minus"></i><?php } if($m10 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m11', '<?php if($m11 === 1){ ?><i class="glyphicon glyphicon-ok"></i><?php } if($m11 === 0){?><i class="glyphicon glyphicon-minus"></i><?php } if($m11 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m12', '<?php if($m12 === 1){ ?><i class="glyphicon glyphicon-ok"></i><?php } if($m12 === 0){?><i class="glyphicon glyphicon-minus"></i><?php } if($m12 === -1){ ?>&nbsp;<?php } ?>')
                
                ->addColumn('action','<div class="row text-center"><a href="afiliado/{{$year}}/edit" ><i class="glyphicon glyphicon-floppy-disk"></i> Registrar Aporte</a></div>')
                ->make(true);

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
