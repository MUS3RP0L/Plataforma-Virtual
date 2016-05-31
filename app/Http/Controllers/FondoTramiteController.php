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
use Muserpol\Departamento;
use Muserpol\Requisito;
use Muserpol\FondoTramite;
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

        $departamentos = Departamento::all();
        $list_departamentos = array('' => '');
        foreach ($departamentos as $item) {
             $list_departamentos[$item->id]=$item->name;
        }

        return [
            'list_modalidades' => $list_modalidades,
            'list_departamentos' => $list_departamentos  
        ];
    }

    public function getData($afid){

        $afiliado = Afiliado::idIs($afid)->first();

        $conyuge = Conyuge::afiIs($afid)->first();
        if (!$conyuge) {$conyuge = new Conyuge;}

        $fondoTramite = FondoTramite::afiIs($afid)->first();
        if (!$fondoTramite) {
            $fondoTramite = new FondoTramite;
            $fondoTramite->afiliado_id = $afid;
            $fondoTramite->save();
        }

        if ($fondoTramite->modalidad_id) {
            $info_gen = TRUE;
        }else{
            $info_gen = FALSE;
        }

        if ($fondoTramite->obs) {
            $info_obs = TRUE;
        }else{
            $info_obs = FALSE;
        }
         
        $solicitante = Solicitante::fonTraIs($fondoTramite->id)->first();
        if (!$solicitante) {$solicitante = new Solicitante;}

        if ($solicitante->ci) {
            $info_soli = TRUE;
        }else{
            $info_soli = FALSE;
        }

        $requisitos = Requisito::modalidadIs($fondoTramite->modalidad_id)->get();

        $documentos = Documento::fonTraIs($fondoTramite->id)->get();

        if (Documento::fonTraIs($fondoTramite->id)->first()) {
            $info_docu = TRUE;
        }else{
            $info_docu = FALSE;
        }
        
        $data = array(
            'afiliado' => $afiliado,
            'conyuge' => $conyuge,
            'fondoTramite' => $fondoTramite,
            'solicitante' => $solicitante,
            'documentos' => $documentos,
            'requisitos' => $requisitos,
            'info_gen' => $info_gen,
            'info_soli' => $info_soli,
            'info_docu' => $info_docu,
            'info_obs' => $info_obs
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
                case 'gene':

                    $fondoTramite->modalidad_id = trim($request->modalidad);
                    $fondoTramite->departamento_id = trim($request->departamento);
                    $fondoTramite->obs = trim($request->observaciones);

                    $fondoTramite->save();
                    
                    $message = "Información de modalidad de Fondo de Retiro actualizado con éxito";
                break;

                case 'docu':
                    if($fondoTramite->modalidad_id)
                    {

                        foreach (json_decode($request->data) as $item)
                          {   
                            $Documento = Documento::where('fondo_tramite_id', '=', $fondoTramite->id)->where('requisito_id', '=', $item->requisito_id)->first();
                            
                            if (!$Documento) {
                                $Documento = new Documento;
                            }
                            $Documento->requisito_id = $item->requisito_id;
                            $Documento->fondo_tramite_id = $fondoTramite->id;
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
