<?php

namespace Muserpol\Http\Controllers;

use Illuminate\Http\Request;

use Muserpol\Http\Requests;
use Muserpol\Http\Controllers\Controller;

use DB;
use Auth;
use Validator;
use Session;
use Datatables;
use Carbon\Carbon;
use Muserpol\Helper\Util;

use Muserpol\Afiliado;
use Muserpol\Solicitante;
use Muserpol\SoliType;
use Muserpol\FondoTramite;

class SolicitanteController extends Controller
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
        return $this->save($request, $id);
        // return $request;
    }

    public function save($request, $id = false)
    {
        $rules = [

            'pat' => 'min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
            'nom' => 'min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
            'tele_domi' =>'numeric',
            'celu_domi' =>'numeric',

        ];

        $messages = [

            'pat.min' => 'El mínimo de caracteres permitidos para apellido paterno es 3', 
            'pat.regex' => 'Sólo se aceptan letras para apellido paterno',

            'nom.min' => 'El mínimo de caracteres permitidos para nombres es 3',
            'nom.regex' => 'Sólo se aceptan letras para primer nombre',
            'tele_domi.numeric' => 'Sólo se aceptan números para teléfono',
            'celu_domi.numeric' => 'Sólo se aceptan números para celular',


        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()){
            return redirect('afiliado/'.$id)
            ->withErrors($validator)
            ->withInput();
        }
        else{

            $fondoTramite = FondoTramite::where('afiliado_id', '=', $id)->first();

            $solicitante = Solicitante::where('fondo_tramite_id', '=', $fondoTramite->id)->first();

            if (!$solicitante) {
                
                $solicitante = new Solicitante;
            }

            switch ($request->type) {
                case 'titu':

                    
                    $soliType = SoliType::where('id', '=', $request->type_soli)->first();
                    $solicitante->soli_type = $soliType->id;

                    $solicitante->afiliado_id = $id;

                    $solicitante->ci = trim($request->ci);
                    $solicitante->pat = trim($request->pat);
                    $solicitante->mat = trim($request->mat);
                    $solicitante->nom = trim($request->nom);

                    $solicitante->paren = trim($request->paren);

                    $solicitante->zona_domi = trim($request->zona_domi);
                    $solicitante->calle_domi = trim($request->calle_domi);
                    $solicitante->num_domi = trim($request->num_domi);
                    
                    $solicitante->tele_domi = trim($request->tele_domi);
                    $solicitante->celu_domi = trim($request->celu_domi);
                    
                    $solicitante->zona_trab = trim($request->zona_trab);
                    $solicitante->calle_trab = trim($request->calle_trab);
                    $solicitante->num_trab = trim($request->num_trab);

                    $solicitante->save();
                    
                    $message = "Información de Solicitante actualizada con éxito";
                    break;
            }
            Session::flash('message', $message);
        }
        
        return redirect('afiliado/'.$id);
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
