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

    // 'desg',

    // 'cat', 

    // 'sue',
    // 'b_ant',
    // 'b_est',
    // 'b_car',
    // 'b_fro',
    // 'b_ori',
    // 'b_seg',

    // 'dfu',
    // 'nat',
    // 'lac',
    // 'pre',
    // 'sub',
    
    // 'gan',
    // 'cot',
    // 'cot_adi',
    // 'mus',


    public function aportesData(Request $request)
    {   

        $aportes = Aporte::select(['id', 'mes', 'anio', 'niv', 'gra', 'uni', 'item', 'sue',
                             'b_ant', 'b_est', 'b_car', 'b_fro', 'b_ori', 'b_seg',
                             'dfu', 'nat', 'lac', 'pre', 'sub', 'gan', 'cot', 'mus' ])->where('afiliado_id', $request->id);

        return Datatables::of($aportes)->addColumn('period', '{{$mes}}-{{$anio}}')
                        ->addColumn('nivgra', '{{$niv}}-{{$gra}}')->make(true);
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
