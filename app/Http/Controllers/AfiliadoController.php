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
use Muserpol\Grado;
use Datatables;
use Muserpol\Helper\Util;


class AfiliadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('afiliados.index');
    }

    public function afiliadosData()
    {
        $afiliados = Afiliado::select(['id', 'ci', 'pat', 'mat', 'nom', 'matri']);

        return Datatables::of($afiliados)->addColumn('action', function ($user) {
                return  '<div class="row text-center"><a href="afiliado/'.$user->id.'" ><i class="glyphicon glyphicon-zoom-in"></i> Ver</a></div>';
            })->make(true);
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
        $afiliado = Afiliado::idIs($id)->with('aportes')->orderBy('id', 'desc')->firstOrFail();

        $lastAporte = Aporte::afiliadoId($afiliado->id)->orderBy('id', 'desc')->firstOrFail();

        $grado = Grado::where('niv', $lastAporte->niv)->where('grad', $lastAporte->gra)->firstOrFail();

        $totalGanado = DB::table('afiliados')
                ->select(DB::raw('SUM(aportes.gan) as ganado'))
                ->leftJoin('aportes', 'afiliados.id', '=', 'aportes.afiliado_id')
                ->where('afiliados.id', '=', $afiliado->id)
                ->get();
        foreach ($totalGanado as $item) {
            $ganado = $item->ganado;
        }

        $totalSegCiu = DB::table('afiliados')
                ->select(DB::raw('SUM(aportes.b_seg) as SegCiu'))
                ->leftJoin('aportes', 'afiliados.id', '=', 'aportes.afiliado_id')
                ->where('afiliados.id', '=', $afiliado->id)
                ->get();
        foreach ($totalSegCiu as $item) {
            $SegCiu = $item->SegCiu;
        }

        $totalCotizable = DB::table('afiliados')
                ->select(DB::raw('SUM(aportes.cot) as cotizable'))
                ->leftJoin('aportes', 'afiliados.id', '=', 'aportes.afiliado_id')
                ->where('afiliados.id', '=', $afiliado->id)
                ->get();
        foreach ($totalCotizable as $item) {
            $cotizable = $item->cotizable;
        }

        $totalMuserpol = DB::table('afiliados')
                ->select(DB::raw('SUM(aportes.mus) as muserpol'))
                ->leftJoin('aportes', 'afiliados.id', '=', 'aportes.afiliado_id')
                ->where('afiliados.id', '=', $afiliado->id)
                ->get();
        foreach ($totalMuserpol as $item) {
            $muserpol = $item->muserpol;
        }

        //add item 0 +
        $cotizablefinal = $cotizable;

        $Fon = Util::calcFon($muserpol);

        $SegVid = Util::calcVid($muserpol);

        $data = array(
            'afiliado' => $afiliado,
            'lastAporte' => $lastAporte,
            'grado' => $grado,
            'totalGanado' => Util::formatMoneyBs($ganado),
            'totalSegCiu' => Util::formatMoneyBs($SegCiu),
            'totalCotizable' => Util::formatMoneyBs($cotizable),
            'totalCotizableAd' => Util::formatMoneyBs($cotizablefinal),
            'totalFon' => 'Bs ' . $Fon,
            'totalSegVid' => 'Bs ' . $SegVid,
            'totalMuserpol' => Util::formatMoneyBs($muserpol)
        );

        return view('afiliados.view', $data);
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


    public function search()
    {
        return view('afiliados.search');
    }

    public function go_search(Request $request)
    {
        $rules = [
            'search' => 'required',
        ];
        
        $messages = [
            'search.required' => 'El campo es requerido para realizar la búsqueda del Afiliado.',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()){
            return redirect("/")
            ->withErrors($validator)
            ->withInput();
        }
        else{

        $afiliado = Afiliado::ciIs($request->search)->first();

            if($afiliado){
                return redirect("afiliado/{$afiliado->id}");
            }
            else{
                    $message = "No logramos encontrar al Afiliado con Carnet: ".$request->search;

                    Session::flash('message', $message);
                
                return redirect("/");
            }

        }

    }



}
