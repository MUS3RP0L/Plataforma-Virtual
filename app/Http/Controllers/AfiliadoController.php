<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Afiliado;
use App\Aporte;
use App\Grado;

class AfiliadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $afiliados = Afiliado::orderBy('pat', 'asc')->paginate(2);

        return view('afiliados.index', compact('afiliados'));
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

        $data = array(
            'afiliado' => $afiliado,
            'lastAporte' => $lastAporte,
            'grado' => $grado
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

        $afiliado = Afiliado::ciIs($request->search)->firstOrFail();

        return redirect("afiliado/{$afiliado->id}");
    }

}
