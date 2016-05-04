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
use Muserpol\Conyuge;

class ConyugeController extends Controller
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
            'nom2' => 'min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
        ];

        $messages = [

            'pat.min' => 'El mínimo de caracteres permitidos para apellido paterno es 3', 
            'pat.regex' => 'Sólo se aceptan letras para apellido paterno',

            'mat.min' => 'El mínimo de caracteres permitidos para apellido materno es 3',
            'mat.regex' => 'Sólo se aceptan letras para apellido materno',

            'nom.min' => 'El mínimo de caracteres permitidos para primer nombre es 3',
            'nom.regex' => 'Sólo se aceptan letras para primer nombre',

            'nom2.min' => 'El mínimo de caracteres permitidos para teléfono de usuario es 3',
            'nom2.regex' => 'Sólo se aceptan letras para segundo nombre',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()){
            return redirect('afiliado/'.$id)
            ->withErrors($validator)
            ->withInput();
        }
        else{

            $conyuge = Conyuge::where('afiliado_id', '=', $id)->first();

            if (!$conyuge) {
                
                $conyuge = new Conyuge;
            }

            $conyuge->user_id = Auth::user()->id;

            switch ($request->type) {
                case 'cony':

                    $conyuge->afiliado_id = $id;

                    $conyuge->ci = trim($request->ci);
                    $conyuge->pat = trim($request->pat);
                    $conyuge->mat = trim($request->mat);
                    $conyuge->nom = trim($request->nom);
                    $conyuge->nom2 = trim($request->nom2);

                    $conyuge->fech_nac = Util::datePick($request->fech_nac); 

                    $conyuge->fech_dece = Util::datePick($request->fech_dece); 
                    $conyuge->motivo_dece = trim($request->motivo_dece);

                    $conyuge->save();
                    
                    $message = "Información de Conyuge actualizado con éxito";
                    break;
            }
            Session::flash('message', $message);
        }
        
        return redirect('afiliado/'.$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

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
