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

use Muserpol\Affiliate;
use Muserpol\Applicant;
use Muserpol\ApplicantType;
use Muserpol\RetirementFund;

class SolicitanteController extends Controller
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
            'ci' => 'min:4',
            'pat' => 'min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
            'nom' => 'min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
            'tele_domi' =>'numeric',
            'celu_domi' =>'numeric',

        ];

        $messages = [
            'ci.min' => 'El mínimo de caracteres permitidos para Carnet de Identidad es 4',
            'pat.min' => 'El mínimo de caracteres permitidos para apellido paterno es 3',
            'pat.regex' => 'Sólo se aceptan letras para apellido paterno',

            'nom.min' => 'El mínimo de caracteres permitidos para nombres es 3',
            'nom.regex' => 'Sólo se aceptan letras para primer nombre',
            'tele_domi.numeric' => 'Sólo se aceptan números para teléfono',
            'celu_domi.numeric' => 'Sólo se aceptan números para celular',


        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()){
            return redirect('tramite_fondo_retiro/'.$id)
            ->withErrors($validator)
            ->withInput();
        }
        else{

            $RetirementFund = RetirementFund::afiIs($id)->where('deleted_at', '=', null)->orderBy('id', 'desc')->first();
            $Applicant = Applicant::fonTraIs($RetirementFund->id)->orderBy('id', 'asc')->first();

            if (!$Applicant) {
                $Applicant = new Applicant;
            }

            switch ($request->type) {
                case 'soli':

                    $ApplicantType = ApplicantType::where('id', '=', $request->type_soli)->first();
                    $Applicant->applicant_type_id = $ApplicantType->id;

                    $Applicant->retirement_fund_id = $RetirementFund->id;

                    $Applicant->identity_card = trim($request->ci);
                    $Applicant->last_name = trim($request->pat);
                    $Applicant->mothers_last_name = trim($request->mat);
                    $Applicant->first_name = trim($request->nom);

                    $Applicant->kinship = trim($request->paren);

                    $Applicant->home_address = trim($request->direc_domi);
                    $Applicant->home_phone_number = trim($request->tele_domi);
                    $Applicant->home_cell_phone_number = trim($request->celu_domi);

                    $Applicant->work_address = trim($request->direc_trab);

                    $Applicant->save();

                    $message = "Información de Solicitante actualizada con éxito";
                    break;
            }
            Session::flash('message', $message);
        }

        return redirect('tramite_fondo_retiro/'.$id);
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
