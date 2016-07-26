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
                        ->editColumn('code', function ($contribution_payment) { return $contribution_payment->getCode(); })
                        ->addColumn('affiliate_name', function ($contribution_payment) { return $contribution_payment->affiliate->getTittleName(); })
                        ->addColumn('total', function ($contribution_payment) { return Util::formatMoney($contribution_payment->total); })
                        ->editColumn('created_at', function ($contribution_payment) { return Util::getDateShort($contribution_payment->created_at); })
                        ->addColumn('status', function ($contribution_payment) { return $contribution_payment->payment_date ? 'Pagado' : 'Pendiente'; })
                        ->editColumn('payment_date', function ($contribution_payment) { return $contribution_payment->payment_date ? Util::getDateShort($contribution_payment->payment_date) : '-'; })
                        ->addColumn('action', function ($contribution_payment) { return  '
                        <div class="btn-group" style="margin:-3px 0;">
                            <a href="aportepago/' . $contribution_payment->id . '" class="btn btn-success btn-raised btn-sm"><i class="glyphicon glyphicon-eye-open"></i></a>
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

        return redirect('contribution_payment/'.$contribution_payment->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $contribution_payment = ContributionPayment::idIs($id)->first();

        $data = [
            'contribution_payment' => $contribution_payment,
        ];

        return view('contribution_payments.show', $data);
    }

    public function PrintContributionPayment($id)
    {
        $contribution_payment = ContributionPayment::IdIs($id)->first();
        $affiliate = Affiliate::IdIs($contribution_payment->affiliate_id)->first();
        $date = Util::getDateEdit(date('Y-m-d'));

        $current_date = Carbon::now();
        $hour = Carbon::parse($current_date)->toTimeString();
        $view = \View::make('print_pago.pagosaporte.show', compact('ContributionPayment','affiliate','date','hour'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $name_input = $contribution_payment->id;
        $pdf->loadHTML($view)->setPaper('letter');
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int
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
