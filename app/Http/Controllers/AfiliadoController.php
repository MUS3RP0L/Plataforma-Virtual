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
use Muserpol\Grado;
use Muserpol\Unidad;
use Muserpol\AfiState;
use Muserpol\Departamento;
use Muserpol\Solicitante;
use Muserpol\Conyuge;

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

    public function afiliadosData(Request $request)
    {
        $afiliados = Afiliado::select(['id', 'ci', 'pat', 'mat', 'nom', 'nom2', 'matri', 'afi_state_id', 'grado_id']);
        
        if ($request->has('pat'))
        {
            $afiliados->where(function($afiliados) use ($request)
            {
                $afiliados->where('pat', 'like', "%{$request->get('pat')}%");
            });
        }
        if ($request->has('mat'))
        {
            $afiliados->where(function($afiliados) use ($request)
            {
                $afiliados->where('mat', 'like', "%{$request->get('mat')}%");
            });
        }
        if ($request->has('nom'))
        {
            $afiliados->where(function($afiliados) use ($request)
            {
                $afiliados->where('nom', 'like', "%{$request->get('nom')}%");
            });
        }
        if ($request->has('nom2'))
        {
            $afiliados->where(function($afiliados) use ($request)
            {
                $afiliados->where('nom2', 'like', "%{$request->get('nom2')}%");
            });
        }
        if ($request->has('mat'))
        {
            $afiliados->where(function($afiliados) use ($request)
            {
                $afiliados->where('mat', 'like', "%{$request->get('mat')}%");
            });
        }
        if ($request->has('car'))
        {
            $afiliados->where(function($afiliados) use ($request)
            {
                $afiliados->where('ci', 'like', "%{$request->get('car')}%");
            });
        }

        return Datatables::of($afiliados)
                // ->addColumn('gra', function ($afiliado) { return $afiliado->grado->abre; })
                ->addColumn('noms', function ($afiliado) { return $afiliado->nom .' '. $afiliado->nom2; })
                ->addColumn('est', function ($afiliado) { return $afiliado->afi_state->name; })
                ->addColumn('action', function ($afiliado) { return  '<div class="row text-center"><a href="afiliado/'.$afiliado->id.'" ><div class="col-md-12"><i class="glyphicon glyphicon-eye-open"></i></div></a></div>';})
                ->make(true);
    }

    public static function getViewModel()
    {
        $afi_states = AfiState::all();
        $list_afi_states = array('' => '');
        foreach ($afi_states as $item) {
             $list_afi_states[$item->id]=$item->afi_type->name . " " . $item->name;
        }

        $unidades = Unidad::all();
        $list_unidades = array('' => '');
        foreach ($unidades as $item) {
             $list_unidades[$item->id]=$item->cod . " " . $item->lit;
        }

        $grados = Grado::all();
        $list_grados = array('' => '');
        foreach ($grados as $item) {
             $list_grados[$item->id]=$item->niv . "-" . $item->grad . " " . $item->lit;
        } 
        $depa = Departamento::all();
        $list_depas = array('' => '');
        foreach ($depa as $item) {
             $list_depas[$item->id]=$item->name;
        }

        return [
            'list_afi_states' => $list_afi_states,
            'list_unidades' => $list_unidades,
            'list_grados' => $list_grados,
            'list_depas' => $list_depas
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $afiliado = Afiliado::idIs($id)->first();

        $conyuge = Conyuge::afiIs($id)->first();
        if (!$conyuge) {
            $conyuge = new Conyuge;
        }

        if ($afiliado->sex == 'M') {
            $list_est_civ = array('' => '','C' => 'CASADO','S' => 'SOLTERO','V' => 'VIUDO','D' => 'DIVORCIADO');
        }elseif ($afiliado->sex == 'F') {
            $list_est_civ = array('' => '','C' => 'CASADA','S' => 'SOLTERA','V' => 'VIUDA','D' => 'DIVORCIADA');
        }

        if ($afiliado->departamento_nat_id) {
            $afiliado->depa_nat = Departamento::idIs($afiliado->departamento_nat_id)->first()->name;
        }else{
            $afiliado->depa_nat = ""; 
        }
        
        if ($afiliado->departamento_dir_id) {
            $afiliado->depa_dir = Departamento::idIs($afiliado->departamento_dir_id)->first()->name;
        }else{
            $afiliado->depa_dir = ""; 
        }

        if ($afiliado->depa_dir_id || $afiliado->zona || $afiliado->calle || $afiliado->num_domi || $afiliado->tele || $afiliado->celu) {
            $info_dom = TRUE;
        }else{
            $info_dom = FALSE;
        }

        if ($conyuge->ci) {
            $info_cony = TRUE;
        }else{
            $info_cony = FALSE;
        }

        $lastAporte = Aporte::afiIs($afiliado->id)->orderBy('gest', 'desc')->first();
        
        $afiliado->fech_ini_apor = $afiliado->fech_ing;
        $afiliado->fech_fin_apor = $lastAporte->gest;

        $consulta = DB::table('afiliados')
                ->select(DB::raw('SUM(aportes.gan) as ganado, SUM(aportes.b_seg) as SegCiu,
                    SUM(aportes.cot) as cotizable, SUM(aportes.mus) as muserpol,
                    SUM(aportes.fr) as fr, SUM(aportes.sv) as sv'))
                ->leftJoin('aportes', 'afiliados.id', '=', 'aportes.afiliado_id')
                ->where('afiliados.id', '=', $afiliado->id)
                ->get();

        foreach ($consulta as $item) {
            $ganado = $item->ganado;
            $SegCiu = $item->SegCiu;
            $cotizable = $item->cotizable;
            $muserpol = $item->muserpol;
            $Fon = $item->fr;
            $SegVid = $item->sv;
        }

        $data = array(
            'afiliado' => $afiliado,
            'conyuge' => $conyuge,
            'info_dom' => $info_dom,
            'info_cony' => $info_cony,
            'list_est_civ' => $list_est_civ,
            'totalGanado' => Util::formatMoney($ganado),
            'totalSegCiu' => Util::formatMoney($SegCiu),
            'totalCotizable' => Util::formatMoney($cotizable),
            'totalFon' => Util::formatMoney($Fon),
            'totalSegVid' => Util::formatMoney($SegVid),
            'totalMuserpol' => Util::formatMoney($muserpol)
        );
        
        $data = array_merge($data, self::getViewModel());

        return view('afiliados.view', $data);
        
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
            'nom2' => 'min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
            'ap_esp' => 'min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
            
            'tele' =>'numeric',
            'celu' =>'numeric',
            
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

            'ap_esp.min' => 'El mínimo de caracteres permitidos para estado civil es 3',
            'ap_esp.regex' => 'Sólo se aceptan letras para estado civil',

            'tele.numeric' => 'Sólo se aceptan números para teléfono',

            'celu.numeric' => 'Sólo se aceptan números para celular',


        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()){
            return redirect('afiliado/'.$id)
            ->withErrors($validator)
            ->withInput();
        }
        else{

            $afiliado = Afiliado::where('id', '=', $id)->first();

            $afiliado->user_id = Auth::user()->id;
            switch ($request->type) {
                case 'per':

                    $afiliado->ci = trim($request->ci);
                    $afiliado->pat = trim($request->pat);
                    $afiliado->mat = trim($request->mat);
                    $afiliado->nom = trim($request->nom);
                    $afiliado->nom2 = trim($request->nom2);
                    if ($request->ap_esp) {$afiliado->ap_esp = trim($request->ap_esp);}
                    $afiliado->fech_nac = Util::datePick($request->fech_nac); 
                    $afiliado->est_civ = trim($request->est_civ); 
                    if ($afiliado->departamento_nat_id <> trim($request->depa_nat)) {$afiliado->departamento_nat_id = trim($request->depa_nat);}
                    
                    $afiliado->fech_dece = Util::datePick($request->fech_dece); 
                    $afiliado->motivo_dece = trim($request->motivo_dece);

                    $afiliado->save();
                    
                    $message = "Información personal de Afiliado actualizado con éxito";
                    break;

                case 'dom':
                    
                    if ($afiliado->departamento_dir_id <> trim($request->depa_dir)) {$afiliado->departamento_dir_id = trim($request->depa_dir);}
                    $afiliado->zona = trim($request->zona);
                    $afiliado->calle = trim($request->calle);
                    $afiliado->num_domi = trim($request->num_domi);
                    
                    $afiliado->tele = trim($request->tele);
                    $afiliado->celu = trim($request->celu); 

                    $afiliado->save();
                    
                    $message = "Información de domicilio de afiliado actualizado con éxito";
                    break;

                case 'pol':

                    if ($afiliado->afi_state_id <> $request->afi_state_id)
                    {
                        if (trim($request->afi_state_id) <> '' ) {
                            $afiliado->afi_state_id = trim($request->afi_state_id);
                            $afiliado->fech_est = Util::datePick($request->fech_est);
                        }
                    }
                    
                    if ($afiliado->grado_id <> $request->grado_id) 
                    {
                        if (trim($request->grado_id) <> '' ) {
                            $afiliado->grado_id = trim($request->grado_id);
                            $afiliado->fech_gra = Util::datePick($request->fech_gra);
                        }
                    }

                    $afiliado->fech_baja = Util::datePick($request->fech_baja); 
                    $afiliado->motivo_baja = trim($request->motivo_baja);
                    
                    $afiliado->save();
                    
                    $message = "Información policial de afiliado actualizado con éxito";
                    break;          
            }
            
            Session::flash('message', $message);
        }
        
        return redirect('afiliado/'.$id);
    }

   

}
