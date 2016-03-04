<?php

namespace Muserpol\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Validator;
use Session;
use Muserpol\Http\Requests;
use Muserpol\Http\Controllers\Controller;
use Muserpol\IpcTasa;
use Datatables;
use Muserpol\Helper\Util;
use Carbon\Carbon;

class IpcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ipcTasa = IpcTasa::orderBy('id', 'desc')->firstOrFail();

        $date = Carbon::now();

        $data = array(
            'date' => $date->format('m-Y'),
            'ipcTasa' => $ipcTasa

        );

        return view('ipc.index', $data);
    }

    public function ipctasasData()
    {
        $ipcs = IpcTasa::select(['mes', 'anio', 'ipc']);

        return Datatables::of($ipcs)
                ->editColumn('mes', function ($ipc) { return Util::getMes($ipc->mes); })
                ->editColumn('ipc', function ($ipc) { return Util::formatMoney($ipc->ipc); })
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
