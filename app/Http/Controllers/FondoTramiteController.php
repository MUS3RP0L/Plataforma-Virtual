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
use Muserpol\Aporte;
use Muserpol\Conyuge;
use Muserpol\Solicitante;
use Muserpol\Modalidad;
use Muserpol\Departamento;
use Muserpol\Requisito;
use Muserpol\FondoTramite;
use Muserpol\Documento;
use Muserpol\Prestacion;
use Muserpol\Antecedente;


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
             $list_modalidades[$item->id]=$item->abre;
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

        $fondoTramite = FondoTramite::afiIs($afid)->where('deleted_at', '=', null)->first();
        if (!$fondoTramite) {
            
            $now = Carbon::now();
            $last = FondoTramite::whereYear('created_at', '=', $now->year)->where('deleted_at', '=', null)->orderBy('id', 'desc')->first();
            $fondoTramite = new FondoTramite;
            if ($last) {
                $fondoTramite->codigo = $last->codigo + 1;
            }else{
                $fondoTramite->codigo = 1;
            }
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

        $prestaciones = Prestacion::all();

        $antecedentes = Antecedente::fonTraIs($fondoTramite->id)->get();
        if (Antecedente::fonTraIs($fondoTramite->id)->first()) {
            $info_antec = TRUE;
        }else{
            $info_antec = FALSE;
        }

        $lastAporte = Aporte::afiIs($afiliado->id)->orderBy('gest', 'desc')->first();
        $afiliado->fech_ini_apor = $afiliado->fech_ing;
        $afiliado->fech_fin_apor = $lastAporte->gest;

        $data = array(
            'afiliado' => $afiliado,
            'conyuge' => $conyuge,
            'fondoTramite' => $fondoTramite,
            'solicitante' => $solicitante,
            'documentos' => $documentos,
            'requisitos' => $requisitos,
            'prestaciones' => $prestaciones,
            'antecedentes' => $antecedentes,
            'antecedentes2' => $antecedentes,
            'info_gen' => $info_gen,
            'info_soli' => $info_soli,
            'info_docu' => $info_docu,
            'info_obs' => $info_obs,
            'info_antec' => $info_antec
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
        return view('fondotramite.view', self::getData($id));
    }


    public function print_ventanilla($afid) 
    {
        $data = $this->getData($afid);
        $afiliado = $data['afiliado'];
        $requisitos = $data['requisitos'];
        $solicitante = $data['solicitante'];
        $documentos = $data['documentos'];
        $fondoTramite = $data['fondoTramite'];
        $date = Util::getfulldate(date('Y-m-d'));

        $view = \View::make('print.ventanilla.show', compact('afiliado', 'requisitos', 'solicitante', 'fondoTramite', 'documentos', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $name_input = $afiliado->id ."-" . $afiliado->pat ."-" . $afiliado->mat ."-" . $afiliado->nom ."-" . $afiliado->ci;
        $pdf->loadHTML($view)->setPaper('letter')->save('pdf/fondo_retiro/ventanilla/' . $name_input . '.pdf');
        return $pdf->stream();
    }

    public function print_certificacion($afid) 
    {
        $data = $this->getData($afid);
        $afiliado = $data['afiliado'];
        $solicitante = $data['solicitante'];
        $fondoTramite = $data['fondoTramite'];
        $prestaciones = $data['prestaciones'];
        $antecedentes = $data['antecedentes'];
        
        $date = Util::getfulldate(date('Y-m-d'));

        $view = \View::make('print.certificacion.show', compact('afiliado', 'solicitante', 'fondoTramite', 'prestaciones', 'antecedentes', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $name_input = $afiliado->id ."-" . $afiliado->pat ."-" . $afiliado->mat ."-" . $afiliado->nom ."-" . $afiliado->ci;
        $pdf->loadHTML($view)->setPaper('letter')->save('pdf/fondo_retiro/certificacion/' . $name_input . '.pdf');
        return $pdf->stream();
    }
    
    public function print_calificacion($afid)
    {
        $data = $this->getData($afid);
        $afiliado = $data['afiliado'];
        $conyuge = $data['conyuge'];
        $solicitante = $data['solicitante'];
        $date = Util::getfulldate(date('Y-m-d'));
        $view =  \View::make('print.calificacion.show', compact('afiliado', 'conyuge','solicitante', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $name_input = $afiliado->id ."-" . $afiliado->pat ."-" . $afiliado->mat ."-" . $afiliado->nom ."-" . $afiliado->ci;
        $pdf->loadHTML($view)->setPaper('letter')->save('pdf/fondo_retiro/calificacion/' . $name_input . '.pdf');
        return $pdf->stream('calif');
    }

    public function print_dictamenlegal($afid)
    {
        $data = $this->getData($afid);
        $afiliado = $data['afiliado'];
        $solicitante = $data['solicitante'];
        $fondoTramite = $data['fondoTramite'];
        $documentos = $data['documentos'];
        $date = Util::getfulldate(date('Y-m-d'));
        $view =  \View::make('print.dictamenlegal.show', compact('afiliado', 'solicitante','documentos','fondoTramite', 'date'))->render();
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
            $fondoTramite = FondoTramite::where('afiliado_id', '=', $afiliado->id)->where('deleted_at', '=', null)->first();

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
                            $Documento = Documento::where('fondo_tramite_id', '=', $fondoTramite->id)
                                            ->where('requisito_id', '=', $item->requisito_id)->first();
                            
                            if (!$Documento) {
                                $Documento = new Documento;
                                $Documento->fondo_tramite_id = $fondoTramite->id;
                                $Documento->requisito_id = $item->requisito_id;
                            }
                            $Documento->est = $item->booleanValue;
                            $Documento->fech_pres = date('Y-m-d');
                            $Documento->save();

                        }

                        $message = "Información de requisitos de Fondo de Retiro actualizado con éxito";
                    }else{
                        $message = "Seleccione la modalidad";
                    }                
                break;

                case 'antec':

                    foreach (json_decode($request->data) as $item)
                    {   
                        $antecedente = Antecedente::where('fondo_tramite_id', '=', $fondoTramite->id)
                                        ->where('prestacion_id', '=', $item->prestacion_id)->first();
                        
                        if (!$antecedente) {
                            $antecedente = new Antecedente;
                            $antecedente->fondo_tramite_id = $fondoTramite->id;
                            $antecedente->prestacion_id = $item->prestacion_id;
                        }
                        $antecedente->est = $item->booleanValue;
                        $antecedente->save();
                    }

                    $message = "Información de requisitos de Fondo de Retiro actualizado con éxito";
               
                break;

                case 'periods':

                    $afiliado->fech_ini_serv = Util::datePickPeriod($request->fech_ini_serv);
                    $afiliado->fech_fin_serv = Util::datePickPeriod($request->fech_fin_serv);
                    $fondoTramite->save();
                    
                    $fondoTramite->fech_ini_anti = Util::datePickPeriod($request->fech_ini_anti);
                    $fondoTramite->fech_fin_anti = Util::datePickPeriod($request->fech_fin_anti);

                    $fondoTramite->fech_ini_reco = Util::datePickPeriod($request->fech_ini_reco);
                    $fondoTramite->fech_fin_reco = Util::datePickPeriod($request->fech_fin_reco);

                    $fondoTramite->save();
                    
                    $message = "Información de Periodos de Aporte actualizado con éxito";
                    break;

            }
            Session::flash('message', $message);
        }
        
        return redirect('tramite_fondo_retiro/'.$id);
    }

    public function destroy($afid)
    {
        $fondoTramite = FondoTramite::afiIs($afid)->where('deleted_at', '=', null)->first();
        $fondoTramite->delete();

        $message = "Trámite de Fondo de Retiro Eliminado";
        Session::flash('message', $message);
        return redirect('afiliado/'.$afid);
    }
}
