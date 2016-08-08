<?php

namespace Muserpol\Http\Controllers\Voucher;

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
use Muserpol\DirectContribution;
use Muserpol\Contribution;
use Muserpol\Category;
use Muserpol\ContributionRate;
use Muserpol\IpcRate;
use Muserpol\BaseWage;
use Muserpol\Voucher;
use Muserpol\VoucherType;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voucher_types = VoucherType::all();
        $voucher_types_list =  ['' => ''];
        foreach ($voucher_types as $item) {
            $voucher_types_list[$item->id]=$item->name;
        }

        $data = [

            'voucher_types_list' => $voucher_types_list

        ];

        return view('vouchers.index', $data);
    }

    public function Data(Request $request)
    {
        $vouchers = Voucher::select(['id', 'affiliate_id', 'voucher_type_id', 'code', 'created_at', 'total', 'payment_date']);

        if ($request->has('code'))
        {
            $vouchers->where(function($vouchers) use ($request)
            {
                $code = trim($request->get('code'));
                $vouchers->where('code', 'like', "%{$code}%");
            });
        }
        if ($request->has('affiliate_name'))
        {
            $vouchers->where(function($vouchers) use ($request)
            {
                $affiliate_name = trim($request->get('affiliate_name'));
                $vouchers->where('affiliate_name', 'like', "%{$affiliate_name}%");
            });
        }
        if ($request->has('creation_date'))
        {
            $vouchers->where(function($vouchers) use ($request)
            {
                $creation_date = Util::datePick($request->get('creation_date'));
                $vouchers->where('created_at', 'like', "%{$creation_date}%");
            });
        }
        if ($request->has('voucher_type'))
        {
            $vouchers->where(function($vouchers) use ($request)
            {
                $voucher_type = trim($request->get('voucher_type'));
                $vouchers->where('voucher_type_id', 'like', "%{$voucher_type}%");
            });
        }
        if ($request->has('payment_date'))
        {
            $vouchers->where(function($vouchers) use ($request)
            {
                $payment_date = Util::datePick($request->get('payment_date'));
                $vouchers->where('payment_date', 'like', "%{$payment_date}%");
            });
        }

        return Datatables::of($vouchers)
                ->addColumn('affiliate_name', function ($voucher) { return $voucher->affiliate->getTittleName(); })
                ->editColumn('voucher_type', function ($voucher) { return $voucher->voucher_type->name; })
                ->addColumn('total', function ($voucher) { return Util::formatMoney($voucher->total); })
                ->editColumn('created_at', function ($voucher) { return $voucher->getCreationDate(); })
                ->addColumn('status', function ($voucher) { return $voucher->payment_date ? 'Pagado' : 'Pendiente'; })
                ->editColumn('payment_date', function ($voucher) { return $voucher->payment_date ? Util::getDateShort($voucher->payment_date) : '-'; })
                ->addColumn('action', function ($voucher) { return
                    '<div class="btn-group" style="margin:-3px 0;">
                        <a href="voucher/'.$voucher->id.'" class="btn btn-primary btn-raised btn-sm">&nbsp;&nbsp;<i class="glyphicon glyphicon-eye-open"></i>&nbsp;&nbsp;</a>
                        <a href="" class="btn btn-primary btn-raised btn-sm dropdown-toggle" data-toggle="dropdown">&nbsp;<span class="caret"></span>&nbsp;</a>
                        <ul class="dropdown-menu">
                            <li><a href="voucher/delete/ '.$voucher->id.' " style="padding:3px 10px;"><i class="glyphicon glyphicon-ban-circle"></i> Anular</a></li>
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

     }

     public function save($request, $user = false)
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

            $voucher = new Voucher;
            $voucher->user_id = Auth::user()->id;
            $voucher->affiliate_id = $request->affiliate_id;
            $voucher->total = $data->sum_total;
            $voucher->save();

            $message = "Aportes Guardados";
            Session::flash('message', $message);

        }

        return redirect('direct_contribution/'.$direct_contribution->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($voucher)
    {
        $affiliate = Affiliate::IdIs($voucher->affiliate_id)->first();
        $voucher->total = Util::formatMoney($voucher->total);

        $data = [
            'voucher' => $voucher,
            'affiliate' => $affiliate,
        ];

        return view('vouchers.show', $data);
    }

    public function PrintVoucher($id)
    {
        // $direct_contribution = DirectContribution::idIs($id)->first();
        // $affiliate = Affiliate::IdIs($direct_contribution->affiliate_id)->first();
        // $date = Util::getDateEdit(date('Y-m-d'));
        //
        // $current_date = Carbon::now();
        // $hour = Carbon::parse($current_date)->toTimeString();
        // $view = \View::make('direct_contributions.print.show', compact('direct_contribution','affiliate','date','hour'))->render();
        // $pdf = \App::make('dompdf.wrapper');
        // $name_input = $direct_contribution->id;
        // $pdf->loadHTML($view)->setPaper('letter');
        // return $pdf->stream();
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

    public function update(Request $request, $voucher)
    {
        return $this->save($request, $voucher);
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
