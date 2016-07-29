<?php

namespace Muserpol\Http\Controllers\Voucher;

use Illuminate\Http\Request;

use Muserpol\Http\Requests;
use Muserpol\Http\Controllers\Controller;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vouchers.index');
    }

    public function Data(Request $request)
    {

        $vouchers = Voucher::select(['id', 'affiliate_id', 'contribution_type_id', 'code', 'created_at', 'total']);

        return Datatables::of($vouchers)
                        ->editColumn('code', function ($voucher) { return $voucher->getCode(); })
                        ->addColumn('affiliate_name', function ($voucher) { return $voucher->affiliate->getTittleName(); })
                        ->addColumn('total', function ($voucher) { return Util::formatMoney($voucher->total); })
                        ->editColumn('created_at', function ($voucher) { return Util::getDateShort($voucher->created_at); })
                        ->addColumn('action', function ($voucher) { return  '
                        <div class="btn-group" style="margin:-3px 0;">
                            <a href="aportepago/' . $voucher->id . '" class="btn btn-success btn-raised btn-sm"><i class="glyphicon glyphicon-eye-open"></i></a>
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
