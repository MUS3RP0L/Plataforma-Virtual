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

use Muserpol\Afiliado;
use Muserpol\Aporte;
use Muserpol\AportePago;
use Muserpol\Categoria;
use Muserpol\AporTasa;
use Muserpol\IpcTasa;

use Illuminate\Support\Collection;

class AporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aportesData(Request $request)
    {   

        $aportes = Aporte::select(['id', 'gest', 'grado_id', 'unidad_id', 'item', 'sue',
                             'b_ant', 'b_est', 'b_car', 'b_fro', 'b_ori', 'b_seg',
                             'dfu', 'nat', 'lac', 'pre', 'sub', 'gan', 'cot', 'mus', 'fr', 'sv' ])->where('afiliado_id', $request->id);

        return Datatables::of($aportes)
                        ->editColumn('gest', function ($aportes) { return Carbon::parse($aportes->gest)->month . "-" . Carbon::parse($aportes->gest)->year ; })
                        ->editColumn('grado_id', function ($aportes) { return $aportes->grado_id ? $aportes->grado->niv . "-" . $aportes->grado->grad : ''; })
                        ->editColumn('unidad_id', function ($aportes) { return $aportes->unidad_id ? $aportes->unidad->cod : ''; })
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
                        ->editColumn('fr', function ($aportes) { return Util::formatMoney($aportes->fr); })
                        ->editColumn('sv', function ($aportes) { return Util::formatMoney($aportes->sv); })
                        ->make(true);
    }

    public function ViewAporte($afid)
    {

        $afiliado = Afiliado::idIs($afid)->first();
        $firstAporte = Aporte::afiIs($afiliado->id)->orderBy('gest', 'asc')->first();
        if ($firstAporte) {
            $data = array(
                'afiliado' => $afiliado,
            );
            return view('aportes.view', $data);
        }
        else
        {
            $message = "No existe Registro de Aportes";
            Session::flash('message', $message);
            return redirect('afiliado/'.$afid);
        }
    }

    public function RegPagoData(Request $request)
    {   
        $afiliado = Afiliado::idIs($request->id)->first();
        $afi["afi_id"] = $afiliado->id;

        $gestiones = new Collection;

        $from = Carbon::parse($afiliado->fech_ing);
        
        $fto = Carbon::now();
        $to = Carbon::createFromDate($fto->year, $fto->month, 1)->subMonth();

        for ($i=$from->year; $i <= $to->year ; $i++) { 
            $c["count"] = 0;
            $c["total"] = 0;
            $base = array();
            $mes = array();
 
            for ($j=1; $j <= 12; $j++) { 
                $aportes = Aporte::select(['gest'])->where('afiliado_id', $afiliado->id)->where('gest', '=',Carbon::createFromDate($i, $j, 1)->toDateString())->first();
                if ($aportes) {
                    $mes["m".$j] = 1;
                    $c["count"] ++;
                    $c["total"] ++;
                }else{
                   $mes["m".$j] = 0;
                   $c["total"] ++;
                }
                if ($i == $from->year) {
                    if($j < $from->month){
                        $mes["m".$j] = -1;
                        $c["total"] --;
                    }
                }
                if ($i == $to->year) {
                    if($j > $to->month){
                        $mes["m".$j] = -1;
                        $c["total"] --;
                    }
                }
                $base = array_merge($base, $mes);
            }
            if ($c["total"] == $c["count"]) {
                $c["status"] = 0;
            }else{
                $c["status"] = 1;
            }
            $year = array('year'=> $i);
            $gestiones->push(array_merge($afi, $c, $year, $base));
        }
        return Datatables::of($gestiones)
                ->editColumn('m1', '<?php if($m1 === 1){ ?><i class="glyphicon glyphicon-check"></i><?php } if($m1 === 0){?><i class="glyphicon glyphicon-unchecked"></i><?php } if($m1 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m2', '<?php if($m2 === 1){ ?><i class="glyphicon glyphicon-check"></i><?php } if($m2 === 0){?><i class="glyphicon glyphicon-unchecked"></i><?php } if($m2 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m3', '<?php if($m3 === 1){ ?><i class="glyphicon glyphicon-check"></i><?php } if($m3 === 0){?><i class="glyphicon glyphicon-unchecked"></i><?php } if($m3 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m4', '<?php if($m4 === 1){ ?><i class="glyphicon glyphicon-check"></i><?php } if($m4 === 0){?><i class="glyphicon glyphicon-unchecked"></i><?php } if($m4 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m5', '<?php if($m5 === 1){ ?><i class="glyphicon glyphicon-check"></i><?php } if($m5 === 0){?><i class="glyphicon glyphicon-unchecked"></i><?php } if($m5 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m6', '<?php if($m6 === 1){ ?><i class="glyphicon glyphicon-check"></i><?php } if($m6 === 0){?><i class="glyphicon glyphicon-unchecked"></i><?php } if($m6 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m7', '<?php if($m7 === 1){ ?><i class="glyphicon glyphicon-check"></i><?php } if($m7 === 0){?><i class="glyphicon glyphicon-unchecked"></i><?php } if($m7 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m8', '<?php if($m8 === 1){ ?><i class="glyphicon glyphicon-check"></i><?php } if($m8 === 0){?><i class="glyphicon glyphicon-unchecked"></i><?php } if($m8 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m9', '<?php if($m9 === 1){ ?><i class="glyphicon glyphicon-check"></i><?php } if($m9 === 0){?><i class="glyphicon glyphicon-unchecked"></i><?php } if($m9 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m10', '<?php if($m10 === 1){ ?><i class="glyphicon glyphicon-check"></i><?php } if($m10 === 0){?><i class="glyphicon glyphicon-unchecked"></i><?php } if($m10 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m11', '<?php if($m11 === 1){ ?><i class="glyphicon glyphicon-check"></i><?php } if($m11 === 0){?><i class="glyphicon glyphicon-unchecked"></i><?php } if($m11 === -1){ ?>&nbsp;<?php } ?>')
                ->editColumn('m12', '<?php if($m12 === 1){ ?><i class="glyphicon glyphicon-check"></i><?php } if($m12 === 0){?><i class="glyphicon glyphicon-unchecked"></i><?php } if($m12 === -1){ ?>&nbsp;<?php } ?>')
                ->addColumn('action','
                    <?php if($status === 1){ ?>
                        <div class="btn-group" style="margin:-6px 0;">
                            <a href="{{ url("calcaportegest")}}/{{$afi_id}}/{{$year}}/n" class="btn btn-success btn-raised btn-sm"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="" data-target="#" class="btn btn-success btn-raised btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url("calcaportegest")}}/{{$afi_id}}/{{$year}}/reintegro" style="padding:3px 10px;"><i class="glyphicon glyphicon-pencil"></i> reintegro</a></li>
                            </ul>
                        </div>
                    <?php } ?>')
                ->make(true);
    }
    public function SelectGestAporte($afid)
    {
        $afiliado = Afiliado::idIs($afid)->first();
        $data = array(
            'afiliado' => $afiliado,
        );
        return view('aportes.gest', $data);
    }

    public static function getViewModel($afid, $gestid)
    {
        $afiliado = Afiliado::idIs($afid)->first();

        $cate = Categoria::all();
        $list_cate = array('' => '');
        foreach ($cate as $item) {
             $list_cate[$item->id]=$item->name;
        }

        $from = Carbon::parse($afiliado->fech_ing);
        $fto = Carbon::now();
        $to = Carbon::createFromDate($fto->year, $fto->month, 1)->subMonth();
        $IpcAct = IpcTasa::select('ipc')->where('gest', '=',Carbon::createFromDate($fto->year, $fto->month, 1)->toDateString())->first();
        $months = new Collection;
        $month = array();

        for ($j=1; $j <= 12; $j++) { 
            $aportes = Aporte::select(['gest'])->where('afiliado_id', $afid)->where('gest', '=',Carbon::createFromDate($gestid, $j, 1)->toDateString())->first();
            $AporTasa = AporTasa::where('gest', '=',Carbon::createFromDate($gestid, $j, 1)->toDateString())->first();
            $IpcTasa = IpcTasa::where('gest', '=',Carbon::createFromDate($gestid, $j, 1)->toDateString())->first();
            if(!$aportes) {
                if ($gestid == $from->year) {
                    if($j >= $from->month){
                        $month["id"] = $j;
                        $month["name"] = Util::getMes($j);
                        $month["fr_a"] = $AporTasa->apor_fr_a;
                        $month["apor_sv_a"] = $AporTasa->apor_sv_a;
                        $month["ipc"] = $IpcTasa->ipc;
                        $months->push($month);
                    }
                }
                elseif ($gestid == $to->year) {
                    if($j <= $to->month){
                        $month["id"] = $j;
                        $month["name"] = Util::getMes($j);
                        $month["fr_a"] = $AporTasa->apor_fr_a;
                        $month["sv_a"] = $AporTasa->apor_sv_a;
                        $month["ipc"] = $IpcTasa->ipc;
                        $months->push($month);
                    }
                }else{
                    $month["id"] = $j;
                    $month["name"] = Util::getMes($j);
                    $month["fr_a"] = $AporTasa->apor_fr_a;
                    $month["sv_a"] = $AporTasa->apor_sv_a;
                    $month["ipc"] = $IpcTasa->ipc;
                    $months->push($month);
                }
            }  
        }

        return [
            'months' => $months,
            'IpcAct' => $IpcAct,
            'list_cate' => $list_cate,
            'categorias' => Categoria::where('name', '<>', '')->orderBy('id', 'asc')->get(array('por', 'name', 'id'))
        ];
    }

    public function CalcAporteGest($afid, $gestid, $type = null)
    {
        $afiliado = Afiliado::idIs($afid)->first();
        $lastAporte = Aporte::afiIs($afiliado->id)->orderBy('gest', 'desc')->first();
        $afiliado->fech_ini_apor = Util::getdateabre($afiliado->fech_ing);
        $afiliado->fech_fin_apor = Util::getdateabre($lastAporte->gest);


        $data = array(
            'afiliado' => $afiliado,
            'lastAporte' => $lastAporte,
            'type' => $type == "reintegro" ? "Reintegro" : "Normal",
            'afid' => $afid,
            'gestid' => $gestid,
            'result' => 0
        );

        $data = array_merge($data, self::getViewModel($afid, $gestid));
        return view('aportes.calc', $data);
    }

    public function GenerateCalcAporteGest(Request $request)
    {
        $afiliado = Afiliado::idIs($request->afid)->first();
        $lastAporte = Aporte::afiIs($afiliado->id)->orderBy('gest', 'desc')->first();
        $afiliado->fech_ini_apor = Util::getdateabre($afiliado->fech_ing);
        $afiliado->fech_fin_apor = Util::getdateabre($lastAporte->gest);
        $afiliado->categoria_id = $request->categoria_id;

        $lastAporte->sue = $request->sue;
        $lastAporte->b_est = $request->b_est;
        $lastAporte->b_car = $request->b_car;
        $lastAporte->b_fro = $request->b_fro;
        $lastAporte->b_ori = $request->b_ori;

        $data = array(
            'afiliado' => $afiliado,
            'lastAporte' => $lastAporte,
            'type' => $request->type == "reintegro" ? "Reintegro" : "Normal",
            'afid' => $request->afid,
            'gestid' => $request->gestid,
            'result' => 1
        );

        $data = array_merge($data, self::getViewModel($request->afid, $request->gestid));
        return view('aportes.calc', $data);
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
        return $this->save($request);
        // return $request->data;
    }

    public function save($request, $id = false)
    {       
        $rules = [
            
            'afid' => 'required',
            
        ];

        $messages = [
            
            'afid.required' => 'Afiliado no disponible', 
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()){
            return redirect('afiliado/'.$request->afid)
            ->withErrors($validator)
            ->withInput();
        }
        else{

            $afiliado = Afiliado::where('id', '=', $request->afid)->first();

            $data = json_decode($request->data);

            $pago = new AportePago;
            $pago->user_id = Auth::user()->id;
            $pago->afiliado_id = $afiliado->id;
            $pago->save();

            $tCot = 0;
            $tApo = 0;
            $tAfr = 0;
            $tAsv = 0;
            $tipc = 0;
            $tTap = 0;

            foreach ($data->aportes as $item)
            {  
                $gest = Carbon::createFromDate($request->gestid, $item->idMonth, 1)->toDateString();
                $aporte = Aporte::where('gest', '=', $gest)->where('afiliado_id', '=', $afiliado->id)->first();
                $por_apor = AporTasa::where('gest', '=', $gest)->first();
                $IpcTasa = IpcTasa::where('gest', '=', $gest)->first();
                $fto = Carbon::now();
                $IpcAct = IpcTasa::select('ipc')->where('gest', '=',Carbon::createFromDate($fto->year, $fto->month, 1)->toDateString())->first();

                if (!$aporte) {

                    $aporte = new Aporte;
                    $aporte->user_id = Auth::user()->id;
                    $aporte->aporte_type_id = 2;
                    $aporte->afiliado_id = $afiliado->id;
                    $aporte->gest = $gest;

                    $aporte->sue = $item->haber;
                    $aporte->categoria_id = $item->categoria->id;
                    $aporte->b_ant = $item->anti;
                    $aporte->b_est = $item->estu;
                    $aporte->b_car = $item->carg;
                    $aporte->b_fro = $item->fron;
                    $aporte->b_ori = $item->orie;
                    
                    
                    $aporte->cot = (FLOAT)$aporte->sue + (FLOAT)$aporte->b_ant + (FLOAT)$aporte->b_est + (FLOAT)$aporte->b_car + (FLOAT)$aporte->b_fro + (FLOAT)$aporte->b_ori;
                    $aporte->fr = $aporte->cot * $por_apor->apor_fr_a / 100;
                    $aporte->sv = $aporte->cot * $por_apor->apor_sv_a / 100;
                    $aporte->sub_mus = $aporte->cot * $por_apor->apor_a / 100;          
                    $aporte->ipc = $aporte->sub_mus * ( $IpcAct->ipc / $IpcTasa->ipc -1 );

                    $aporte->mus = $aporte->sub_mus + $aporte->ipc;
                    $aporte->save();            

                    $tCot += $aporte->cot;
                    $tApo += $aporte->sub_mus;
                    $tAfr += $aporte->fr;
                    $tAsv += $aporte->sv;
                    $tipc += $aporte->ipc;
                    $tTap += $aporte->mus;
                }

                $pago->cot = $tCot;
                $pago->mus = $tApo;
                $pago->fr = $tAfr;
                $pago->sv = $tAsv;
                $pago->ipc = $tipc;
                $pago->total = $tTap;
                $pago->save();
            }
                    
            $message = "Aportes Guardados";      
            
            Session::flash('message', $message);
        }
        
        return redirect('afiliado/'.$id);
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
