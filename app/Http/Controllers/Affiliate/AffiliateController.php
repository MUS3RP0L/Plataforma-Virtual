<?php

namespace Muserpol\Http\Controllers\Affiliate;

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

use Muserpol\Affiliate;
use Muserpol\Contribution;
use Muserpol\City;
use Muserpol\Spouse;

class AffiliateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('affiliates.index');
    }

    public function Data(Request $request)
    {
        $affiliates = Affiliate::select(['id', 'identity_card', 'registration', 'last_name', 'mothers_last_name', 'first_name', 'second_name',  'affiliate_state_id', 'degree_id']);
        
        if ($request->has('last_name'))
        {
            $affiliates->where(function($affiliates) use ($request)
            {   
                $last_name = trim($request->get('last_name'));
                $affiliates->where('last_name', 'like', "%{$last_name}%");
            });
        }
        if ($request->has('mothers_last_name'))
        {
            $affiliates->where(function($affiliates) use ($request)
            {   
                $mothers_last_name = trim($request->get('mothers_last_name'));
                $affiliates->where('mothers_last_name', 'like', "%{$mothers_last_name}%");
            });
        }
        if ($request->has('first_name'))
        {
            $affiliates->where(function($affiliates) use ($request)
            {
                $first_name = trim($request->get('first_name'));
                $affiliates->where('first_name', 'like', "%{$first_name}%");
            });
        }
        if ($request->has('second_name'))
        {
            $affiliates->where(function($affiliates) use ($request)
            {
                $second_name = trim($request->get('second_name'));
                $affiliates->where('second_name', 'like', "%{$second_name}%");
            });
        }
        if ($request->has('identity_card'))
        {
            $affiliates->where(function($affiliates) use ($request)
            {
                $identity_card = trim($request->get('identity_card'));
                $affiliates->where('identity_card', 'like', "%{$identity_card}%");
            });
        }
        if ($request->has('registration'))
        {
            $affiliates->where(function($affiliates) use ($request)
            {
                $registration = trim($request->get('registration'));
                $affiliates->where('registration', 'like', "%{$registration}%");
            });
        }
        
        return Datatables::of($affiliates)
                ->addColumn('degree', function ($affiliate) { return $affiliate->degree_id ? $affiliate->degree->shortened : ''; })
                ->editColumn('last_name', function ($affiliate) { return Util::ucw($affiliate->last_name); })
                ->editColumn('mothers_last_name', function ($affiliate) { return Util::ucw($affiliate->mothers_last_name); })
                ->addColumn('names', function ($affiliate) { return Util::ucw($affiliate->first_name) .' '. Util::ucw($affiliate->second_name); })
                ->addColumn('state', function ($affiliate) { return $affiliate->affiliate_state->name; })
                ->addColumn('action', function ($affiliate) { return  '
                        <div class="btn-group" style="margin:-3px 0;">
                            <a href="afiliado/'.$affiliate->id.'" class="btn btn-success btn-raised btn-sm"><i class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="" data-target="#" class="btn btn-success btn-raised btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="selectgestaporte/'.$affiliate->id.'" style="padding:3px 10px;"><i class="glyphicon glyphicon-plus"></i> Aporte</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="tramite_fondo_retiro/'.$affiliate->id.'" style="padding:3px 10px;"><i class="glyphicon glyphicon-plus"></i> Trámite FR</a></li>
                            </ul>
                        </div>';})
                ->make(true);
    }

    public static function getViewModel()
    {

        $depa = Departamento::all();
        $list_depas = array('' => '');
        foreach ($depa as $item) {
             $list_depas[$item->id]=$item->name;
        }

        $list_depas_abre = array('' => '');
        foreach ($depa as $item) {
             $list_depas_abre[$item->id]=$item->cod;
        }

        return [
            'list_depas' => $list_depas,
            'list_depas_abre' => $list_depas_abre
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

        if ($afiliado->departamento_exp_id) {
            $afiliado->depa_exp = Departamento::idIs($afiliado->departamento_exp_id)->first()->cod;
        }else{
            $afiliado->depa_exp = ""; 
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
                    if (empty($request->depa_exp))
                    {
                        $afiliado->departamento_exp_id = null;
                    }
                    else
                    {
                        $afiliado->departamento_exp_id = $request->depa_exp;
                    }
                    $afiliado->pat = trim($request->pat);
                    $afiliado->mat = trim($request->mat);
                    $afiliado->nom = trim($request->nom);
                    $afiliado->nom2 = trim($request->nom2);
                    $afiliado->ap_esp = trim($request->ap_esp);
                    $afiliado->fech_nac = Util::datePick($request->fech_nac); 
                    $afiliado->est_civ = trim($request->est_civ); 
                    if ($afiliado->departamento_nat_id <> trim($request->depa_nat)) {$afiliado->departamento_nat_id = trim($request->depa_nat);}
                    
                    if ($request->fallecidoCheck == "on") {
                        $afiliado->fech_dece = Util::datePick($request->fech_dece); 
                        $afiliado->motivo_dece = trim($request->motivo_dece);
                    }else{
                        $afiliado->fech_dece = null; 
                        $afiliado->motivo_dece = null;
                    }

                    $afiliado->save();
                    
                    $message = "Información personal de Afiliado actualizado con éxito". $request->fallecidoCheck;
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
            }
            
            Session::flash('message', $message);
        }
        
        return redirect('afiliado/'.$id);
    }

    public function SearchAffiliate(Request $request)
    {
        $rules = [
            'identity_card' => 'required',
        ];
        
        $messages = [
            'identity_card.required' => 'El campo es requerido para realizar la búsqueda del Afiliado.',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
            return redirect("/")
            ->withErrors($validator)
            ->withInput();
        }
        else{

        $affiliate = Affiliate::identitycardIs($request->identity_card)->first();

            if($affiliate) {
                return redirect("affiliate/{$affiliate->id}");
            }
            else {
                $message = "No logramos encontrar al Afiliado con Carnet: ".$request->identity_card;
                Session::flash('message', $message);
                return redirect("affiliate");
            }

        }
    }

   

}
