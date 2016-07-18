<?php

namespace Muserpol\Http\Controllers\Contribution;

use Illuminate\Http\Request;
use Muserpol\Http\Requests;
use Muserpol\Http\Controllers\Controller;

use Auth;
use Validator;
use Session;
use Datatables;
use Carbon\Carbon;
use Muserpol\Helper\Util;
use Illuminate\Support\Collection;

use Muserpol\Affiliate;
use Muserpol\Contribution;
use Muserpol\ContributionPayment;
use Muserpol\Category;
use Muserpol\ContributionRate;
use Muserpol\IpcRate;

class ContributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ShowContributions($affiliate_id)
    {
        $affiliate = Affiliate::idIs($affiliate_id)->first();

        $last_contribution = Contribution::affiliateidIs($affiliate->id)->first();

        if ($last_contribution) {

            $data = [

                'affiliate' => $affiliate,

            ];

            return view('contributions.view', $data);
        }
        else {

            $message = "No existe Registro de Aportes";
            Session::flash('message', $message);

            return redirect('affiliate/'.$affiliate_id);
        }
    }

    public function ShowData(Request $request)
    {   
        $contributions = Contribution::select(['id', 'month_year', 'degree_id', 'unit_id', 'item', 'base_wage','seniority_bonus', 'study_bonus', 'position_bonus', 'border_bonus', 'east_bonus', 'public_security_bonus', 'gain', 'quotable', 'retirement_fund', 'mortuary_quota', 'total'])
                                        ->where('affiliate_id', $request->affiliate_id);

        return Datatables::of($contributions)
                ->editColumn('month_year', function ($contribution) { return Carbon::parse($contribution->month_year)->month . "-" . Carbon::parse($contribution->month_year)->year ; })
                ->editColumn('degree_id', function ($contribution) { return $contribution->degree_id ? $contribution->degree->code_level . "-" . $contribution->degree->code_degree : ''; })
                ->editColumn('unit_id', function ($contribution) { return $contribution->unit_id ? $contribution->unit->code : ''; })
                ->editColumn('base_wage', function ($contribution) { return Util::formatMoney($contribution->base_wage); })
                ->editColumn('seniority_bonus', function ($contribution) { return Util::formatMoney($contribution->seniority_bonus); })
                ->editColumn('study_bonus', function ($contribution) { return Util::formatMoney($contribution->study_bonus); })
                ->editColumn('position_bonus', function ($contribution) { return Util::formatMoney($contribution->position_bonus); })
                ->editColumn('border_bonus', function ($contribution) { return Util::formatMoney($contribution->border_bonus); })
                ->editColumn('east_bonus', function ($contribution) { return Util::formatMoney($contribution->east_bonus); })
                ->editColumn('public_security_bonus', function ($contribution) { return Util::formatMoney($contribution->public_security_bonus); })
                ->editColumn('gain', function ($contribution) { return Util::formatMoney($contribution->gain); })
                ->editColumn('quotable', function ($contribution) { return Util::formatMoney($contribution->quotable); })
                ->editColumn('retirement_fund', function ($contribution) { return Util::formatMoney($contribution->retirement_fund); })
                ->editColumn('mortuary_quota', function ($contribution) { return Util::formatMoney($contribution->mortuary_quota); })
                ->editColumn('total', function ($contribution) { return Util::formatMoney($contribution->total); })
                ->make(true);
    }
    
    public function SelectContribution($affiliate_id)
    {
        $affiliate = Affiliate::idIs($affiliate_id)->first();
        
        $data = array(
            'affiliate' => $affiliate,
        );

        return view('contributions.select', $data);
    }

    public function SelectData(Request $request)
    {   
        $affiliate = Affiliate::idIs($request->affiliate_id)->first();
        $afi["affiliate"] = $affiliate->id;

        $group_contributions = new Collection;

        $now = Carbon::now();
        $from = Carbon::parse($affiliate->date_entry);      
        $to = Carbon::createFromDate($now->year, $now->month, 1)->subMonth();

        for ($i=$from->year; $i <= $to->year ; $i++) { 

            $count = 0;
            $total = 0;

            $base = array();
            $mes = array();
 
            for ($j=1; $j <= 12; $j++) { 

                $contribution = Contribution::select(['month_year'])->where('affiliate_id', $affiliate->id)->where('month_year', '=',Carbon::createFromDate($i, $j, 1)->toDateString())->first();
                
                if ($i == $from->year) {
                    if($j < $from->month){
                        $mes["m".$j] = -1;
                        $total --;
                    }
                }

                if ($contribution) {
                    $mes["m".$j] = 1;
                    $count ++;
                    $total ++;
                }else {
                   $mes["m".$j] = 0;
                   $total ++;
                }
                
                if ($i == $to->year) {
                    if($j > $to->month){
                        $mes["m".$j] = -1;
                        $total --;
                    }
                }
                $base = array_merge($base, $mes);

            }

            if ($total == $count) {
                $c["status"] = false;
            }else {
                $c["status"] = true;
            }
            $year = array('year'=> $i);
            $group_contributions->push(array_merge($afi, $c, $year, $base));
        }
        return Datatables::of($group_contributions)
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
                    <?php if($status){ ?>
                        <div class="btn-group" style="margin:-6px 0;">
                            <a href="{{ url("calculation_contribution")}}/{{$affiliate}}/{{$year}}/normal" class="btn btn-success btn-raised btn-sm"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="" data-target="#" class="btn btn-success btn-raised btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url("calculation_contribution")}}/{{$affiliate}}/{{$year}}/reintegro" style="padding:3px 10px;"><i class="glyphicon glyphicon-pencil"></i> reintegro</a></li>
                            </ul>
                        </div>
                    <?php } ?>')
                ->make(true);
    }

    public static function getViewModel($afid, $gestid)
    {
        $affiliate = Afiliado::idIs($afid)->first();

        $cate = Categoria::all();
        $list_cate = array('' => '');
        foreach ($cate as $item) {
             $list_cate[$item->id]=$item->name;
        }

        $from = Carbon::parse($affiliate->fech_ing);
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
        $affiliate = Afiliado::idIs($afid)->first();
        $lastAporte = Aporte::afiIs($affiliate->id)->orderBy('gest', 'desc')->first();
        $affiliate->fech_ini_apor = Util::getdateabre($affiliate->fech_ing);
        $affiliate->fech_fin_apor = Util::getdateabre($lastAporte->gest);


        $data = array(
            'afiliado' => $affiliate,
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
        $affiliate = Afiliado::idIs($request->afid)->first();
        $lastAporte = Aporte::afiIs($affiliate->id)->orderBy('gest', 'desc')->first();
        $affiliate->fech_ini_apor = Util::getdateabre($affiliate->fech_ing);
        $affiliate->fech_fin_apor = Util::getdateabre($lastAporte->gest);
        $affiliate->categoria_id = $request->categoria_id;

        $lastAporte->sue = $request->sue;
        $lastAporte->b_est = $request->b_est;
        $lastAporte->b_car = $request->b_car;
        $lastAporte->b_fro = $request->b_fro;
        $lastAporte->b_ori = $request->b_ori;

        $data = array(
            'afiliado' => $affiliate,
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        return $this->save($request);
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

            $affiliate = Afiliado::where('id', '=', $request->afid)->first();

            $data = json_decode($request->data);

            $now = Carbon::now();
            $last = ContributionPayment::whereYear('created_at', '=', $now->year)->where('deleted_at', '=', null)->orderBy('id', 'desc')->first();
            $pago = new AportePago;
            if ($last) {
                $pago->codigo = $last->codigo + 1;
            }else{
                $pago->codigo = 1;
            }
            $pago->user_id = Auth::user()->id;
            $pago->afiliado_id = $affiliate->id;
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
                $aporte = Aporte::where('gest', '=', $gest)->where('afiliado_id', '=', $affiliate->id)->first();
                $por_apor = AporTasa::where('gest', '=', $gest)->first();
                $IpcTasa = IpcTasa::where('gest', '=', $gest)->first();
                $fto = Carbon::now();
                $IpcAct = IpcTasa::select('ipc')->where('gest', '=',Carbon::createFromDate($fto->year, $fto->month, 1)->toDateString())->first();

                if (!$aporte) {

                    $aporte = new Aporte;
                    $aporte->user_id = Auth::user()->id;
                    $aporte->aporte_type_id = 2;
                    $aporte->afiliado_id = $affiliate->id;
                    $aporte->aporte_pago_id = $pago->id;
    
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
}
