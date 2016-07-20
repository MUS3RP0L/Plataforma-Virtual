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

use Muserpol\Affiliate;
use Muserpol\ContributionPayment;
use Muserpol\Contribution;
use Muserpol\ContributionRate;
use Muserpol\IpcRate;

class ContributionPaymentController extends Controller
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
        return $this->save($request);
    }

    public function save($request)
    {
        $rules = [

            'affiliate_id' => 'required',

        ];

        $messages = [

            'affiliate_id.required' => 'Afiliado no disponible',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('affiliate/'.$request->affiliate_id)
            ->withErrors($validator)
            ->withInput();
        }
        else {

            $contribution_payment = new ContributionPayment;

            $now = Carbon::now();
            $last_contribution_payment = ContributionPayment::whereYear('created_at', '=', $now->year)->where('deleted_at', '=', null)->orderBy('id', 'desc')->first();
            if ($last_contribution_payment) {
                $contribution_payment->code = $last_contribution_payment->code + 1;
            }else{
                $contribution_payment->code = 1;
            }

            $contribution_payment->user_id = Auth::user()->id;
            $contribution_payment->affiliate_id = $request->affiliate_id;
            $contribution_payment->save();

            $sum_quotable = 0;
            $sum_subtotal = 0;
            $sum_retirement_fund = 0;
            $sum_mortuary_quota = 0;
            $sum_ipc = 0;
            $sum_total = 0;

            foreach (json_decode($request->data)->contributions as $item)
            {
                $month_year = Carbon::createFromDate($request->year, $item->id_month, 1)->toDateString();
                $contribution = Contribution::where('month_year', '=', $month_year)->where('affiliate_id', '=', $request->affiliate_id)->first();
                $contribution_rate = ContributionRate::where('month_year', '=', $month_year)->first();
                $ipc_rate = IpcRate::where('month_year', '=', $month_year)->first();
                $now = Carbon::now();
                $ipc_actual = IpcRate::select('index')->where('month_year', '=',Carbon::createFromDate($now->year, $now->month, 1)->toDateString())->first();

                if (!$contribution) {

                    $contribution = new Contribution;
                    $contribution->user_id = Auth::user()->id;
                    $contribution->contribution_type_id = 2;
                    $contribution->affiliate_id = $request->affiliate_id;
                    $contribution->contribution_payment_id = $contribution_payment->id;

                    $contribution->month_year = $month_year;

                    $contribution->base_wage = $item->base_wage;
                    $contribution->category_id = $item->category->id;
                    $contribution->seniority_bonus = $item->seniority_bonus;
                    $contribution->study_bonus = $item->study_bonus;
                    $contribution->position_bonus = $item->position_bonus;
                    $contribution->border_bonus = $item->border_bonus;
                    $contribution->east_bonus = $item->east_bonus;

                    $contribution->quotable = (FLOAT)$contribution->base_wage + (FLOAT)$contribution->seniority_bonus + (FLOAT)$contribution->study_bonus + (FLOAT)$contribution->position_bonus + (FLOAT)$contribution->border_bonus + (FLOAT)$contribution->east_bonus;
                    $contribution->retirement_fund = $contribution->quotable * $contribution_rate->retirement_fund / 100;
                    $contribution->mortuary_quota = $contribution->quotable * $contribution_rate->mortuary_quota / 100;
                    $contribution->subtotal = $contribution->retirement_fund + $contribution->mortuary_quota;
                    $contribution->ipc = $contribution->subtotal * ( $ipc_actual->index / $ipc_rate->index -1 );

                    $contribution->total = $contribution->subtotal + $contribution->ipc;
                    $contribution->save();

                    $sum_quotable += $contribution->quotable;
                    $sum_retirement_fund += $contribution->retirement_fund;
                    $sum_mortuary_quota += $contribution->mortuary_quota;
                    $sum_subtotal += $contribution->subtotal;
                    $sum_ipc += $contribution->ipc;
                    $sum_total += $contribution->total;
                }

                $contribution_payment->quotable = $sum_quotable;
                $contribution_payment->retirement_fund = $sum_retirement_fund;
                $contribution_payment->mortuary_quota = $sum_mortuary_quota;
                $contribution_payment->subtotal = $sum_subtotal;
                $contribution_payment->ipc = $sum_ipc;
                $contribution_payment->total = $sum_total;
                $contribution_payment->save();
            }
            $message = "Aportes Guardados";

            Session::flash('message', $message);

        }
        return redirect('affiliate');
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
