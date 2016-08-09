<?php

namespace Muserpol\Http\Controllers\RetirementFund;

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
use Muserpol\Applicant;
use Muserpol\ApplicantType;
use Muserpol\RetirementFund;

class ApplicantController extends Controller
{

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $retirement_fund_id)
    {
        return $this->save($request, $retirement_fund_id);
    }

    public function save($request, $retirement_fund_id = false)
    {
        $rules = [

            'identity_card' => 'min:4',
            'last_name' => 'min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
            'first_name' => 'min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
            'home_address' =>'numeric',
            'home_phone_number' =>'numeric',
        ];

        $messages = [

            'identity_card.min' => 'El mínimo de caracteres permitidos para Carnet de Identidad es 4',
            'last_name.min' => 'El mínimo de caracteres permitidos para apellido paterno es 3',
            'last_name.regex' => 'Sólo se aceptan letras para apellido paterno',
            'first_name.min' => 'El mínimo de caracteres permitidos para nombres es 3',
            'first_name.regex' => 'Sólo se aceptan letras para primer nombre',
            'home_address.numeric' => 'Sólo se aceptan números para teléfono',
            'home_phone_number.numeric' => 'Sólo se aceptan números para celular',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()){
            return redirect('retirement_fund/'.$retirement_fund_id)
            ->withErrors($validator)
            ->withInput();
        }
        else{

            $RetirementFund = RetirementFund::afiIs($retirement_fund_id)->where('deleted_at', '=', null)->orderBy('id', 'desc')->first();
            $Applicant = Applicant::retirementFundIs($RetirementFund->id)->orderBy('id', 'asc')->first();

            if (!$Applicant) {
                $Applicant = new Applicant;
            }

            $ApplicantType = ApplicantType::where('id', '=', $request->type_applicant)->first();
            $Applicant->applicant_type_id = $ApplicantType->id;
            $Applicant->retirement_fund_id = $RetirementFund->id;
            $Applicant->identity_card = trim($request->identity_card);
            $Applicant->last_name = trim($request->last_name);
            $Applicant->mothers_last_name = trim($request->mothers_last_name);
            $Applicant->first_name = trim($request->first_name);
            $Applicant->kinship = trim($request->kinship);
            $Applicant->home_address = trim($request->home_address);
            $Applicant->home_phone_number = trim($request->home_phone_number);
            $Applicant->home_cell_phone_number = trim($request->home_cell_phone_number);
            $Applicant->work_address = trim($request->work_address);

            $Applicant->save();

            $message = "Información de Solicitante actualizada con éxito";

            }
            Session::flash('message', $message);
        }

        return redirect('retirement_fund/'.$retirement_fund_id);
    }

}
