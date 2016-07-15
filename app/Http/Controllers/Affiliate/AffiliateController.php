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
                            <a href="affiliate/'.$affiliate->id.'" class="btn btn-success btn-raised btn-sm"><i class="glyphicon glyphicon-eye-open"></i></a>
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
        $cities = City::all();
        $cities_list = ['' => ''];
        foreach ($cities as $item) {
            $cities_list[$item->id]=$item->name;
        }

        $cities_list_short = ['' => ''];
        foreach ($cities as $item) {
            $cities_list_short[$item->id]=$item->shortened;
        }

        return [

            'cities_list' => $cities_list,
            'cities_list_short' => $cities_list_short
            
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($affiliate)
    {
        $spouse = Spouse::affiliateidIs($affiliate->id)->first();
        if (!$spouse) {
            $spouse = new Spouse;
        }
        if ($affiliate->gender == 'M') {
            $gender_list = ['' => '', 'C' => 'CASADO', 'S' => 'SOLTERO', 'V' => 'VIUDO', 'D' => 'DIVORCIADO'];
        }elseif ($affiliate->gender == 'F') {
            $gender_list = ['' => '', 'C' => 'CASADA', 'S' => 'SOLTERA', 'V' => 'VIUDA', 'D' => 'DIVORCIADA'];
        }
        if ($affiliate->city_identity_card_id) {
            $affiliate->city_identity_card = City::idIs($affiliate->city_identity_card_id)->first()->cod;
        }else {
            $affiliate->city_identity_card = ''; 
        }
        if ($affiliate->city_birth_id) {
            $affiliate->city_birth = City::idIs($affiliate->city_birth_id)->first()->name;
        }else {
            $affiliate->city_birth = ''; 
        }       
        if ($affiliate->city_address_id) {
            $affiliate->city_address = City::idIs($affiliate->city_address_id)->first()->name;
        }else {
            $affiliate->city_address = ''; 
        }
        if ($affiliate->city_address_id || $affiliate->zone || $affiliate->Street || $affiliate->number_address || $affiliate->phone || $affiliate->cell_phone) {
            $info_address = TRUE;
        }else{
            $info_address = FALSE;
        }
        if ($spouse->identity_card) {
            $info_spouse = TRUE;
        }else{
            $info_spouse = FALSE;
        }

        $last_contribution = Contribution::affiliateidIs($affiliate->id)->orderBy('month_year', 'desc')->first();

        $consulta = DB::table('affiliates')
                        ->select(DB::raw('SUM(contributions.gain) as gain, SUM(contributions.public_security_bonus) as public_security_bonus,
                                        SUM(contributions.quotable) as quotable, SUM(contributions.total) as total,
                                        SUM(contributions.retirement_fund) as retirement_fund, SUM(contributions.mortuary_quota) as mortuary_quota'))
                        ->leftJoin('contributions', 'affiliates.id', '=', 'contributions.affiliate_id')
                        ->where('affiliates.id', '=', $affiliate->id)
                        ->get();

        foreach ($consulta as $item) {
            $total_gain = Util::formatMoney($item->gain);
            $total_public_security_bonus = Util::formatMoney($item->public_security_bonus);
            $total_quotable = Util::formatMoney($item->quotable);
            $total_retirement_fund = Util::formatMoney($item->retirement_fund);
            $total_mortuary_quota = Util::formatMoney($item->mortuary_quota);
            $total = Util::formatMoney($item->total);
        }

        $data = [

            'affiliate' => $affiliate,
            'spouse' => $spouse,
            'gender_list' => $gender_list,
            'info_address' => $info_address,
            'info_spouse' => $info_spouse,
            'last_contribution' => $last_contribution,
            'total_gain' => $total_gain,
            'total_public_security_bonus' => $total_public_security_bonus,
            'total_quotable' => $total_quotable,
            'total_retirement_fund' => $total_retirement_fund,
            'total_mortuary_quota' => $total_mortuary_quota,
            'total' => $total

        ];
       
        $data = array_merge($data, self::getViewModel());
        
        return view('affiliates.view', $data);
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
            
            'last_name' => 'min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
            'mothers_last_name' => 'min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
            'first_name' => 'min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
            'second_name' => 'min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
            'surname_husband' => 'min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
            'phone' =>'numeric',
            'cell_phone' =>'numeric'
            
        ];

        $messages = [

            'last_name.min' => 'El mínimo de caracteres permitidos para apellido paterno es 3', 
            'last_name.regex' => 'Sólo se aceptan letras para apellido paterno',

            'mothers_last_name.min' => 'El mínimo de caracteres permitidos para apellido materno es 3',
            'mothers_last_name.regex' => 'Sólo se aceptan letras para apellido materno',

            'first_name.min' => 'El mínimo de caracteres permitidos para primer nombre es 3',
            'first_name.regex' => 'Sólo se aceptan letras para primer nombre',

            'second_name.min' => 'El mínimo de caracteres permitidos para teléfono de usuario es 3',
            'second_name.regex' => 'Sólo se aceptan letras para segundo nombre',

            'surname_husband.min' => 'El mínimo de caracteres permitidos para estado civil es 3',
            'surname_husband.regex' => 'Sólo se aceptan letras para estado civil',

            'phone.numeric' => 'Sólo se aceptan números para teléfono',

            'cell_phone.numeric' => 'Sólo se aceptan números para celular'

        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()){
            return redirect('affiliate/'.$id)
            ->withErrors($validator)
            ->withInput();
        }
        else{

            $affiliate = Affiliate::where('id', '=', $id)->first();

            $affiliate->user_id = Auth::user()->id;

            switch ($request->type) {
                case 'personal':

                    $affiliate->identity_card = trim($request->identity_card);
                    if ($affiliate->city_identity_card_id <> trim($request->city_identity_card_id)) {$affiliate->city_identity_card_id = trim($request->city_identity_card_id);}
                    // $affiliate->pat = trim($request->pat);
                    // $affiliate->mat = trim($request->mat);
                    // $affiliate->nom = trim($request->nom);
                    // $affiliate->nom2 = trim($request->nom2);
                    // $affiliate->ap_esp = trim($request->ap_esp);
                    // $affiliate->fech_nac = Util::datePick($request->fech_nac); 
                    // $affiliate->est_civ = trim($request->est_civ); 
                    // if ($affiliate->departamento_nat_id <> trim($request->depa_nat)) {$affiliate->departamento_nat_id = trim($request->depa_nat);}
                    
                    // if ($request->fallecidoCheck == "on") {
                    //     $affiliate->fech_dece = Util::datePick($request->fech_dece); 
                    //     $affiliate->motivo_dece = trim($request->motivo_dece);
                    // }else{
                    //     $affiliate->fech_dece = null; 
                    //     $affiliate->motivo_dece = null;
                    // }

                    $affiliate->save();
                    
                    $message = "Información personal de Afiliado actualizado con éxito". $request->fallecidoCheck;
                    break;

                case 'dom':
                    
                    if ($affiliate->departamento_dir_id <> trim($request->depa_dir)) {$affiliate->departamento_dir_id = trim($request->depa_dir);}
                    $affiliate->zona = trim($request->zona);
                    $affiliate->calle = trim($request->calle);
                    $affiliate->num_domi = trim($request->num_domi);
                    
                    $affiliate->tele = trim($request->tele);
                    $affiliate->celu = trim($request->celu); 

                    $affiliate->save();
                    
                    $message = "Información de domicilio de afiliado actualizado con éxito";
                    break;         
            }
            
            Session::flash('message', $message);
        }
        
        return redirect('affiliate/'.$id);
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
