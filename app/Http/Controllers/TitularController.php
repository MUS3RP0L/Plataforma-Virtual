<?php

namespace Muserpol\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use Validator;
use Session;
use Muserpol\Http\Requests;
use Muserpol\Http\Controllers\Controller;
use Muserpol\Afiliado;
use Muserpol\Titular;
use Datatables;
use Muserpol\Helper\Util;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class TitularController extends Controller
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
    }

    public function save($request, $id = false)
    {
        $rules = [
            'pat' => 'min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
            'mat' => 'min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
            'nom' => 'min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
            'ap_esp' => 'min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
        ];

        $messages = [

            'pat.min' => 'El mínimo de caracteres permitidos para apellido paterno es 3', 
            'pat.regex' => 'Sólo se aceptan letras para apellido paterno',

            'mat.min' => 'El mínimo de caracteres permitidos para apellido materno es 3',
            'mat.regex' => 'Sólo se aceptan letras para apellido materno',

            'nom.min' => 'El mínimo de caracteres permitidos para primer nombre es 3',
            'nom.regex' => 'Sólo se aceptan letras para primer nombre',

            'ap_esp.min' => 'El mínimo de caracteres permitidos para estado civil es 3',
            'ap_esp.regex' => 'Sólo se aceptan letras para estado civil',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()){
            return redirect('afiliado/'.$id)
            ->withErrors($validator)
            ->withInput();
        }
        else{

            $titular = Titular::where('afiliado_id', '=', $id)->first();

            if (!$titular) {
                
                $titular = new Titular;
            }

            $titular->user_id = Auth::user()->id;

            switch ($request->type) {
                case 'titu':

                    $titular->afiliado_id = $id;

                    $titular->ci = trim($request->ci);
                    $titular->pat = trim($request->pat);
                    $titular->mat = trim($request->mat);
                    $titular->nom = trim($request->nom);

                    $titular->paren = trim($request->paren);

                    $titular->zona_domi = trim($request->zona_domi);
                    $titular->calle_domi = trim($request->calle_domi);
                    $titular->num_domi = trim($request->num_domi);
                    
                    $titular->tele_domi = trim($request->tele_domi);
                    $titular->celu_domi = trim($request->celu_domi);
                    
                    $titular->zona_trab = trim($request->zona_trab);
                    $titular->calle_trab = trim($request->calle_trab);
                    $titular->num_trab = trim($request->num_trab);

                    $titular->save();
                    
                    $message = "Información personal de Titular actualizado con éxito";
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
