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
        return view('contribution_payments.index');
    }

    public function Data(Request $request)
    {

        $contribution_payments = ContributionPayment::select(['id', 'affiliate_id', 'type', 'payment_date', 'code', 'created_at', 'total']);

        return Datatables::of($contribution_payments)
                        ->editColumn('code', function ($contribution_payment) { return $contribution_payment->getNumberTram(); })
                        ->addColumn('affiliate_name', function ($contribution_payment) { return $contribution_payment->affiliate->getTittleName(); })
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

            $data = json_decode($request->data);
            foreach ($data->contributions as $item)
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

                    $contribution->quotable = $item->quotable;
                    $contribution->retirement_fund = $item->subtotal_retirement_fund;
                    $contribution->mortuary_quota = $item->subtotal_mortuary_quota;
                    $contribution->subtotal = $item->subtotal;
                    $contribution->ipc = $item->subtotal_ipc_rate;
                    $contribution->total = $item->total;
                    $contribution->save();
                }

                $contribution_payment->quotable = $data->sum_quotable;
                $contribution_payment->retirement_fund = $data->sum_subtotal_retirement_fund;
                $contribution_payment->mortuary_quota = $data->sum_subtotal_mortuary_quota;
                $contribution_payment->subtotal = $data->sum_subtotal;
                $contribution_payment->ipc = $data->sum_subtotal_ipc_rate;
                $contribution_payment->total = $data->sum_total;
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
