<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Afiliado;
use App\Aporte;
use App\Grado;
use Datatables;


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
        return Datatables::of(Afiliado::get())->make(true);
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

        $totalMuserpol = DB::table('afiliados')
                ->select(DB::raw('SUM(aportes.mus) as muserpol'))
                ->leftJoin('aportes', 'afiliados.id', '=', 'aportes.afiliado_id')
                ->where('afiliados.id', '=', $afiliado->id)
                ->get();
        foreach ($totalMuserpol as $item) {
            $muserpol = $item->muserpol;
        }


        $data = array(
            'afiliado' => $afiliado,
            'lastAporte' => $lastAporte,
            'grado' => $grado,
            'totalGanado' => $ganado,
            'totalMuserpol' => $muserpol
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
                Session::flash('message', "No logramos encontrar al Afiliado con Carnet: ".$request->search);
                
                return redirect("/");
            }

        }

    }



}
