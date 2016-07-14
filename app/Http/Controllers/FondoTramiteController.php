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
use Muserpol\Contribution;
use Muserpol\Spouse;
use Muserpol\Applicant;
use Muserpol\RetirementFundModality;
use Muserpol\City;
use Muserpol\Requirement;
use Muserpol\RetirementFund;
use Muserpol\Document;
use Muserpol\Antecedent;
use Muserpol\AntecedentFile;


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
        $modality = RetirementFundModality::all();
        $list_modality = array('' => '');
        foreach ($modality as $item) {
             $list_modality[$item->id]=$item->name;
        }

        $city = City::all();
        $list_city = array('' => '');
        foreach ($city as $item) {
             $list_city[$item->id]=$item->name;
        }

        $antecedentfile = AntecedentFile::all();


        return [
            'list_modality' => $list_modality,
            'list_city' => $list_city,
            'antecedentfile' => $antecedentfile
        ];
    }

    public function getData($afid){

        $affiliate = Affiliate::idIs($afid)->first();
        
        $spouse = Spouse::afiIs($afid)->first();
        if (!$spouse) {$spouse = new Spouse;}
        
        $retirementfund = RetirementFund::afiIs($afid)->first();
        if (!$retirementfund) {
            
            $now = Carbon::now();
            $last = RetirementFund::whereYear('created_at', '=', $now->year)->where('deleted_at', '=', null)->orderBy('id', 'desc')->first();
            $retirementfund = new RetirementFund;
            if ($last) {
                $retirementfund->code = $last->code + 1;
            }else{
                $retirementfund->code = 1;
            }
            $retirementfund->affiliate_id = $afid;
            $retirementfund->save();
        }

        $applicant = Applicant::fonTraIs($retirementfund->id)->first();
        if (!$applicant) {$applicant = new Applicant;}
        
         $requirement = Requirement::modalidadIs($retirementfund->retirement_fund_modality_id)->get();
         $document = Document::fonTraIs($retirementfund->id)->get();
         $antecedent = Antecedent::fonTraIs($retirementfund->id)->get();

        if ($retirementfund->retirement_fund_modality_id) {
            $info_gen = TRUE;
        }else{
            $info_gen = FALSE;
        }
        if ($applicant->identity_card) {
            $info_soli = TRUE;
        }else{
            $info_soli = FALSE;
        }
        if (Document::fonTraIs($retirementfund->id)->first()) {
            $info_docu = TRUE;
        }else{
            $info_docu = FALSE;
        }

        if (Antecedent::fonTraIs($retirementfund->id)->first()) {
            $info_antec = TRUE;
        }else{
            $info_antec = FALSE;
        }

        if ($retirementfund->comment) {
            $info_obs = TRUE;
        }else{
            $info_obs = FALSE;
        }

        $lastContribution = Contribution::afiIs($affiliate->id)->orderBy('month_year', 'desc')->first();
        $affiliate->service_start_date = $affiliate->date_entry;
        $affiliate->service_end_date = $lastContribution->month_year;

        $data = array(
            'affiliate' => $affiliate,
            'spouse' => $spouse,
            'retirementfund' => $retirementfund,
            'applicant' => $applicant,
            'requirement' => $requirement,
            'document' => $document,
            'antecedent' => $antecedent,
            'antecedent2' => $antecedent,
            'info_gen' => $info_gen,
            'info_soli' => $info_soli,
            'info_docu' => $info_docu,
            'info_obs' => $info_obs,
            'info_antec' => $info_antec
        );

        $data = array_merge($data, self::getViewModel());

        return $data;
      // return response()->json($data);
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
        $affiliate = $data['affiliate'];
        $requirement = $data['requirement'];
        $applicant = $data['applicant'];
        $document = $data['document'];
        $retirementfund = $data['retirementfund'];
        $date = Util::getfulldate(date('Y-m-d'));

        $view = \View::make('print_fondo_retiro.ventanilla.show', compact('affiliate', 'requirement', 'applicant', 'document', 'retirementfund', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $name_input = $affiliate->id ."-" . $affiliate->last_name ."-" . $affiliate->mothers_last_name ."-" . $affiliate->first_name ."-" . $affiliate->identity_card;
        $pdf->loadHTML($view)->setPaper('letter')->save('pdf/fondo_retiro/ventanilla/' . $name_input . '.pdf');
        return $pdf->stream();
    }

    public function print_certificacion($afid) 
    {
        $data = $this->getData($afid);
        $affiliate = $data['affiliate'];
        $applicant = $data['applicant'];
        $retirementfund = $data['retirementfund'];
        $antecedentfile = $data['antecedentfile'];
        $antecedent = $data['antecedent'];
        $date = Util::getfulldate(date('Y-m-d'));

        $view = \View::make('print_fondo_retiro.certificacion.show', compact('affiliate', 'applicant', 'retirementfund', 'antecedentfile', 'antecedent', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $name_input = $affiliate->id ."-" . $affiliate->last_name ."-" . $affiliate->mothers_last_name ."-" . $affiliate->first_name ."-" . $affiliate->identity_card;
        $pdf->loadHTML($view)->setPaper('letter')->save('pdf/fondo_retiro/certificacion/' . $name_input . '.pdf');
        return $pdf->stream();
    }
    
    public function print_calificacion($afid)
    {
        $data = $this->getData($afid);
        $affiliate = $data['affiliate'];
        $spouse = $data['spouse'];
        $applicant = $data['applicant'];
        $retirementfund = $data['retirementfund'];
        $date = Util::getfulldate(date('Y-m-d'));

        $view =  \View::make('print_fondo_retiro.calificacion.show', compact('affiliate', 'spouse','applicant', 'retirementfund', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $name_input = $affiliate->id ."-" . $affiliate->last_name ."-" . $affiliate->mothers_last_name ."-" . $affiliate->first_name ."-" . $affiliate->identity_card;
        $pdf->loadHTML($view)->setPaper('letter')->save('pdf/fondo_retiro/calificacion/' . $name_input . '.pdf');
        return $pdf->stream('calif');
    }

    public function print_dictamenlegal($afid)
    {
        $data = $this->getData($afid);
        $affiliate = $data['affiliate'];
        $applicant = $data['applicant'];
        $retirementfund = $data['retirementfund'];
        $document = $data['document'];
        $date = Util::getfulldate(date('Y-m-d'));
        $view =  \View::make('print_fondo_retiro.dictamenlegal.show', compact('affiliate', 'applicant','retirementfund','document', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $name_input = $affiliate->id ."-" . $affiliate->last_name ."-" . $affiliate->mothers_last_name ."-" . $affiliate->first_name ."-" . $affiliate->identity_card;
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
            
            'affiliate_id' => 'numeric',
            'retirement_fund_modality_id' => 'numeric',
        ];

        $messages = [
            
            'affiliate_id.numeric' => 'Solo se aceptan números para id afiliado', 
            'retirement_fund_modality_id.numeric' => 'Solo se aceptan números para id modalidad'
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()){
            return redirect('tramite_fondo_retiro/'.$id)
            ->withErrors($validator)
            ->withInput();
        }
        else{

            $retirementfund = RetirementFund::afiIs($id)->first();
            $affiliate = Affiliate::idIs($id)->first();

            switch ($request->type) {

                case 'gene':

                    if($request->modalidad == 4 && $affiliate->date_decommissioned == null)
                    {
                        $message = "Ingrese Fecha de deceso de Afiliado";
                    }
                    else{

                        if ($request->modalidad) {
                        $retirementfund->retirement_fund_modality_id = trim($request->modalidad);
                        }
                        $retirementfund->city_id = trim($request->departamento);
                        $retirementfund->save();

                        switch ($request->modalidad) {
                            case '1':
                                $affiliate->affiliate_state_id = 8;
                                $affiliate->save();
                            break;
                            case '2':
                                $affiliate->affiliate_state_id = 7;
                                $affiliate->save();
                            break;
                            case '3':
                                $affiliate->affiliate_state_id = 5;
                                $affiliate->save();
                            break;
                            case '4':
                                $affiliate->affiliate_state_id = 4;
                                $affiliate->save();
                            break;
                        }
                        $message = "Información General de Fondo de Retiro actualizado con éxito";
                    }     
                break;

                case 'docu':
                    if($retirementfund->retirement_fund_modality_id)
                    {
                        foreach (json_decode($request->data) as $item)
                          {   
                            $Document = Document::where('retirement_fund_id', '=', $retirementfund->id)
                                            ->where('requirement_id', '=', $item->requisito_id)->first();
                            
                            if (!$Document) {
                                $Document = new Document;
                                $Document->retirement_fund_id = $retirementfund->id;
                                $Document->requirement_id = $item->requisito_id;
                            }
                            $Document->status = $item->booleanValue;
                            $Document->reception_date = date('Y-m-d');
                            $Document->save();

                            $retirementfund->reception_date = date('Y-m-d'); 
                            $retirementfund->save();
                        }

                        $message = "Información de requisitos de Fondo de Retiro actualizado con éxito";
                    }else{
                        $message = "Seleccione la modalidad y la ciudad";
                    }                
                break;

                case 'antec':
                    foreach (json_decode($request->data) as $item)
                    {   
                        $antecedent = Antecedent::where('retirement_fund_id', '=', $retirementfund->id)
                                        ->where('antecedent_file_id', '=', $item->prestacion_id)->first();
                        
                        if (!$antecedent) {
                            $antecedent = new Antecedent;
                            $antecedent->retirement_fund_id = $retirementfund->id;
                            $antecedent->antecedent_file_id = $item->prestacion_id;
                        }

                        $antecedent->status = $item->booleanValue;
                        $antecedent->save();
                    }

                     $retirementfund->check_file_date = date('Y-m-d'); 
                     $retirementfund->save();

                    $message = "Información de requisitos de Fondo de Retiro actualizado con éxito";
                break;

                case 'periods':
                    $affiliate->service_start_date = Util::datePickPeriod($request->fech_ini_serv);
                    $affiliate->service_end_date = Util::datePickPeriod($request->fech_fin_serv);
                    $affiliate->save();
                    
                    $retirementfund->anticipation_start_date = Util::datePickPeriod($request->fech_ini_anti);
                    $retirementfund->anticipation_end_date = Util::datePickPeriod($request->fech_fin_anti);

                    $retirementfund->recognized_start_date = Util::datePickPeriod($request->fech_ini_reco);
                    $retirementfund->recognized_end_date = Util::datePickPeriod($request->fech_fin_reco);
                    $retirementfund->save();

                    $retirementfund->qualification_date = date('Y-m-d'); 
                    $retirementfund->save();
                    
                    $message = "Información de Periodos de Aporte actualizado con éxito";
                break;

            }
            Session::flash('message', $message);
        }
        
        return redirect('tramite_fondo_retiro/'.$id);
    }

    public function destroy($afid)
    {
        $retirementfund = RetirementFund::afiIs($afid)->first();
        $retirementfund->delete();

        $message = "Trámite de Fondo de Retiro Eliminado";
        Session::flash('message', $message);
        return redirect('afiliado/'.$afid);
    }
}
