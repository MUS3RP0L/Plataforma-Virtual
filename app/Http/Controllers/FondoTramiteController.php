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
use Muserpol\DictamenLegal;

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
        $documentos = Documento::where('recepcion_id', '=', $recepcion->id)->get();

        if (Documento::where('recepcion_id', '=', $recepcion->id)->first()) {
            $info_requi = TRUE;
            
        }else{
            $info_requi = FALSE;
        }
            $requisitos = Requisito::where('modalidad_id', '=', $fondoTramite->modalidad_id)->get();

        $dictamenlegal = DictamenLegal::where('fondo_tramite_id', '=', $fondoTramite->id)->first();
        if($dictamenlegal){
            $info_dict = 1;
        }
        else{
            $info_dict = 0;
            $dictamenlegal = new DictamenLegal;
        }

        $data = array(
            'afiliado' => $afiliado,
            'conyuge' => $conyuge,
            'fondoTramite' => $fondoTramite,
            'solicitante' => $solicitante,
            'documentos' => $documentos,
            'requisitos' => $requisitos,
            'info_soli' => $info_soli,
            'info_moda' => $info_moda,
            'info_requi' => $info_requi,
            'dictamenlegal' => $dictamenlegal,
            'info_dict' => $info_dict
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
        $solicitante = $data['solicitante'];
        $date = Util::getfulldate(date('Y-m-d'));

        $view = \View::make('print.ventanilla.show', compact('afiliado', 'conyuge', 'solicitante', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $name_input = $afiliado->id ."-" . $afiliado->pat ."-" . $afiliado->mat ."-" . $afiliado->nom ."-" . $afiliado->ci;
        $pdf->loadHTML($view)->setPaper('letter')->save('pdf/fondo_retiro/ventanilla/' . $name_input . '.pdf');
        return $pdf->stream();
    }

    public function print_dictamenlegal($afid)
    {
        $data = $this->getData($afid);
        $afiliado = $data['afiliado'];
        $conyuge = $data['conyuge'];
        $date = Util::getfulldate(date('Y-m-d'));
        $view =  \View::make('print.dictamenlegal.show', compact('afiliado', 'conyuge', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $name_input = $afiliado->id ."-" . $afiliado->pat ."-" . $afiliado->mat ."-" . $afiliado->nom ."-" . $afiliado->ci;
        $pdf->loadHTML($view)->setPaper('letter')->save('pdf/fondo_retiro/dictamen_legal/' . $name_input . '.pdf');
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
                    if($fondoTramite->modalidad_id)
                    {
                        $recepcion = Recepcion::where('fondo_tramite_id', '=', $fondoTramite->id)->first();

                        foreach (json_decode($request->data) as $item)
                          {   
                            $Documento = Documento::where('recepcion_id', '=', $recepcion->id)->where('requisito_id', '=', $item->requisito_id)->first();
                            
                            if (!$Documento) {
                                $Documento = new Documento;
                            }
                            $Documento->requisito_id = $item->requisito_id;
                            $Documento->recepcion_id = $recepcion->id;
                            $Documento->fech_pres = date('Y-m-d');
                            $Documento->est = $item->booleanValue;
                            $Documento->save();

                        }

                        $message = "Información de requisitos de Fondo de Retiro actualizado con éxito";
                    }else{
                        $message = "Seleccione la modalidad";
                    }
                    
                
                break;

                case 'dictamen':
                  
                        $dictamenlegal = DictamenLegal::where('fondo_tramite_id', '=', $fondoTramite->id)->first();
                              if(!$dictamenlegal){
                            $dictamenlegal = new DictamenLegal;
                        }
                        $dictamenlegal->fondo_tramite_id = $fondoTramite->id;
                        $dictamenlegal->cite = trim($request->cite);
                        $dictamenlegal->obs = trim($request->obs);

                        $dictamenlegal->save();
                        $message = "Información de Dictamen Legal actualizado con éxito";
                        
                break;

            }
            Session::flash('message', $message);
        }
        
        return redirect('tramite_fondo_retiro/'.$id);
    }
}
