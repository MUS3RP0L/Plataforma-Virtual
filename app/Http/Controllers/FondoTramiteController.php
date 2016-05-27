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
use Muserpol\Solicitante;
use Muserpol\Modalidad;
use Muserpol\Requisito;
use Muserpol\FondoTramite;
use Muserpol\Recepcion;
use Muserpol\Documento;

class FondoTramiteController extends Controller
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

    public static function getViewModel()
    {
        $modalidades = Modalidad::all();
        $list_modalidades = array('' => '');

        foreach ($modalidades as $item) {
             $list_modalidades[$item->id]=$item->name;
        }

        $requisitos = Requisito::all();
        $list_requisitos = array('' => '');
        foreach ($requisitos as $item) {
             $list_requisitos[$item->id]=$item->name;
        }

        return [
            'list_modalidades' => $list_modalidades,
            'list_requisitos' => $list_requisitos     
        ];
    }

    public function getData($afid){

        $afiliado = Afiliado::idIs($afid)->first();

        $conyuge = Conyuge::where('afiliado_id', '=', $afid)->first();
        if (!$conyuge) {$conyuge = new Conyuge;}

        $fondoTramite = FondoTramite::where('afiliado_id', '=', $afid)->first();
        if (!$fondoTramite) {
            $fondoTramite = new FondoTramite;
            $fondoTramite->afiliado_id = $afid;
            $fondoTramite->save();

            $recepcion = new Recepcion;
            $recepcion->fondo_tramite_id = $fondoTramite->id;
            $recepcion->save();
        }
         
        $solicitante = Solicitante::where('fondo_tramite_id', '=', $fondoTramite->id)->first();

        if (!$solicitante) {$solicitante = new Solicitante;}

        if ($solicitante->ci || $solicitante->pat || $solicitante->mat || $solicitante->nom || $solicitante->nom2) {
            $info_soli = 1;
        }else{
            $info_soli = 0;
        }

        if ($fondoTramite->modalidad_id) {
            $info_moda = 1;
        }else{
            $info_moda = 0;
        }

        $recepcion = Recepcion::where('fondo_tramite_id', '=', $fondoTramite->id)->first();
        $documentos = Documento::where('recepcion_id', '=', $recepcion->id)->first();

        if ($documentos) {
            $info_requi = 1;
        }else{
            $info_requi = 0;
        }

        $data = array(
            'afiliado' => $afiliado,
            'conyuge' => $conyuge,
            'fondoTramite' => $fondoTramite,
            'solicitante' => $solicitante,
            'info_soli' => $info_soli,
            'info_moda' => $info_moda,
            'info_requi' => $info_requi,

        );

        $data = array_merge($data, self::getViewModel());

        return $data;

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('fondotramite.create', self::getData($id));
    }

    public function print_ventanilla($afid) 
    {
        $data = $this->getData($afid);
        $afiliado = $data['afiliado'];
        $conyuge = $data['conyuge'];

        $date = Util::getfulldate(date('Y-m-d'));
        $view =  \View::make('print.ventanilla.show', compact('afiliado', 'conyuge', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $name_input = $afiliado->id ."-" . $afiliado->pat ."-" . $afiliado->mat ."-" . $afiliado->nom ."-" . $afiliado->ci;
        $pdf->loadHTML($view)->setPaper('letter')->save('pdf/' . $name_input . '.pdf');
        return $pdf->stream('calif');
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
            
            'afiliado_id' => 'numeric',
            'modalidad_id' => 'numeric',
            
        ];

        $messages = [
            
            'afiliado_id.numeric' => 'Solo se aceptan números para id afiliado', 
            'modalidad_id.numeric' => 'Solo se aceptan números para id modalidad'

        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()){
            return redirect('tramite_fondo_retiro/'.$id)
            ->withErrors($validator)
            ->withInput();
        }
        else{

            $afiliado = Afiliado::where('id', '=', $id)->first();
            $fondoTramite = FondoTramite::where('afiliado_id', '=', $afiliado->id)->first();

            switch ($request->type) {
                case 'moda':

                    $fondoTramite->modalidad_id = trim($request->modalidad);

                    $fondoTramite->save();
                    
                    $message = "Información de modalidad de Fondo de Retiro actualizado con éxito";
                break;

                case 'requi':

                    $recepcion = Recepcion::where('fondo_tramite_id', '=', $fondoTramite->id)->first();

                    $r = array('1' => $request->r1, '2' => $request->r2, '3' => $request->r3, '4' => $request->r4, '5' => $request->r5,
                               '6' => $request->r6, '7' => $request->r7, '8' => $request->r8, '9' => $request->r9, '10' => $request->r10,
                               '11' => $request->r11, '12' => $request->r12);

                    if($fondoTramite->modalidad_id == 4){
                        $h = 12;
                    }else{
                        $h = 8;
                    }
                    
                    for ($i=1; $i <= $h; $i++) { 
                        $rn = $i;
                        
                        $Documento = Documento::where('recepcion_id', '=', $recepcion->id)->where('requisito_id', '=', $i)->first();
                        if (!$Documento) {
                            $Documento = new Documento;
                        }
                        $Documento->requisito_id = $i;
                        $Documento->recepcion_id = $recepcion->id;
                        $Documento->fech_pres = date('Y-m-d');
                        if ($r[$rn] == "on") {
                            $Documento->est = 'P';
                        }else{
                            $Documento->est = 'O';
                        }
                        $Documento->save();
                    }


                    $message = "Información de requisitos de Fondo de Retiro actualizado con éxito";
                break;

            }
            Session::flash('message', $message);
        }
        
        return redirect('tramite_fondo_retiro/'.$id);
    }
}
