<?php

namespace Muserpol\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Session;
use Muserpol\Http\Requests;
use Muserpol\Http\Controllers\Controller;
use Muserpol\AporTasa;
use Datatables;
use Muserpol\Helper\Util;
use Carbon\Carbon;

class TasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $aporTasa = AporTasa::orderBy('id', 'desc')->firstOrFail();

        $date = Carbon::now();

        $data = array(
            'date' => $date->format('m-Y'),
            'aporTasa' => $aporTasa

        );

        return view('tasas.index', $data);
    }

    public function tasasData()
    {
        $tasas = AporTasa::select(['mes', 'anio', 'apor_a', 'apor_fr_a', 'apor_sv_a', 'apor_p', 'apor_fr_p', 'apor_sv_p']);

        return Datatables::of($tasas)
                // ->editColumn('anio', function ($aportes) { return $aportes->mes . "-" . $aportes->anio; })

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

        $aporTasa = AporTasa::where('id', '=', $id)->firstOrFail();

        $date = Carbon::now();

        $data = [
            'date' => $date->format('m-Y'),
            'aporTasa' => $aporTasa
        ];

        return View('tasas.edit', $data);
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
