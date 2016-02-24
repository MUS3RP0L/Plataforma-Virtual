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
use Muserpol\Unidad;
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
        $afiliados = Afiliado::select(['id', 'ci', 'pat', 'mat', 'nom', 'nom2', 'matri']);

        return Datatables::of($afiliados)
                ->addColumn('niv', function ($afiliado) { return Aporte::select('niv', 'gra')->afiliadoId($afiliado->id)->orderBy('id', 'desc')->first()->niv.'-'.
                    Aporte::select('niv', 'gra')->afiliadoId($afiliado->id)->orderBy('id', 'desc')->first()->gra; })
                ->addColumn('action', function ($afiliado) {
                return  '<div class="row text-center"><a href="afiliado/'.$afiliado->id.'" ><i class="glyphicon glyphicon-zoom-in"></i> Ver</a></div>';})
                ->addColumn('mons', function ($afiliado) { return $afiliado->nom .' '. $afiliado->nom2; })
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
        $afiliado = Afiliado::idIs($id)->with('aportes')->orderBy('id', 'desc')->firstOrFail();

        $firstAporte = Aporte::afiliadoId($afiliado->id)->orderBy('anio', 'asc')->orderBy('mes', 'asc')->firstOrFail();

        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

        $firstAporte->desde = $meses[$firstAporte->mes-1] .' - '.  $firstAporte->anio;

        $lastAporte = Aporte::afiliadoId($afiliado->id)->orderBy('anio', 'desc')->orderBy('mes', 'desc')->firstOrFail();

        $lastAporte->hasta = $meses[$lastAporte->mes-1] .' - '.  $lastAporte->anio;

        $grado = Grado::where('niv', $lastAporte->niv)->where('grad', $lastAporte->gra)->firstOrFail();
        $unidad = Unidad::where('cod', $lastAporte->uni)->firstOrFail();


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
            'firstAporte' => $firstAporte,
            'grado' => $grado,
            'unidad' => $unidad,
            'totalGanado' => Util::formatMoney($ganado),
            'totalSegCiu' => Util::formatMoney($SegCiu),
            'totalCotizable' => Util::formatMoney($cotizable),
            'totalCotizableAd' => Util::formatMoney($cotizablefinal),
            'totalFon' => $Fon,
            'totalSegVid' => $SegVid,
            'totalMuserpol' => Util::formatMoney($muserpol)
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
