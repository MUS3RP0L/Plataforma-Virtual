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


class RetirementFundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $retirement_fund_modality = RetirementFundModality::all();
        $retirement_fund_modality_list =  ['' => ''];
        foreach ($retirement_fund_modality as $item) {
            $retirement_fund_modality_list[$item->id]=$item->name;
        }

        $data = [

            'retirement_fund_modality_list' => $retirement_fund_modality_list

        ];

        return view('retirement_funds.index', $data);
    }

    public function Data(Request $request)
    {
        $retirement_funds = RetirementFund::select(['id', 'affiliate_id', 'retirement_fund_modality_id', 'code', 'created_at', 'total']);

        if ($request->has('code'))
        {
            $retirement_funds->where(function($retirement_funds) use ($request)
            {
                $code = trim($request->get('code'));
                $retirement_funds->where('code', 'like', "%{$code}%");
            });
        }
        if ($request->has('affiliate_name'))
        {
            $retirement_funds->where(function($retirement_funds) use ($request)
            {
                $affiliate_name = trim($request->get('affiliate_name'));
                $retirement_funds->where('affiliate_name', 'like', "%{$affiliate_name}%");
            });
        }
        if ($request->has('retirement_fund_modality_id'))
        {
            $retirement_funds->where(function($retirement_funds) use ($request)
            {
                $retirement_fund_modality_id = trim($request->get('retirement_fund_modality_id'));
                $retirement_funds->where('retirement_fund_modality_id', 'like', "%{$retirement_fund_modality_id}%");
            });
        }

        return Datatables::of($retirement_funds)
                ->addColumn('affiliate_name', function ($retirement_fund) { return $retirement_fund->affiliate->getTittleName(); })
                ->addColumn('total', function ($retirement_fund) { return Util::formatMoney($retirement_fund->total); })
                ->addColumn('action', function ($retirement_fund) { return
                    '<div class="btn-group" style="margin:-3px 0;">
                        <a href="retirement_fund/'.$retirement_fund->id.'" class="btn btn-primary btn-raised btn-sm">&nbsp;&nbsp;<i class="glyphicon glyphicon-eye-open"></i>&nbsp;&nbsp;</a>
                        <a href="" class="btn btn-primary btn-raised btn-sm dropdown-toggle" data-toggle="dropdown">&nbsp;<span class="caret"></span>&nbsp;</a>
                        <ul class="dropdown-menu">
                            <li><a href="retirement_fund/delete/ '.$retirement_fund->id.' " style="padding:3px 10px;"><i class="glyphicon glyphicon-ban-circle"></i> Anular</a></li>
                        </ul>
                    </div>';})
                ->make(true);
    }

    public static function getViewModel()
    {
        $modality = RetirementFundModality::all();
        $modalities_list = array('' => '');
        foreach ($modality as $item) {
             $modalities_list[$item->id]=$item->name;
        }

        $city = City::all();
        $cities_list = array('' => '');
        foreach ($city as $item) {
             $cities_list[$item->id]=$item->name;
        }

        $antecedent_files = AntecedentFile::all();

        return [
            'modalities_list' => $modalities_list,
            'cities_list' => $cities_list,
            'antecedent_files' => $antecedent_files
        ];
    }

    public function getData($afid)
    {
        $affiliate = Affiliate::idIs($afid)->first();

        $spouse = Spouse::affiliateidIs($afid)->first();
        if (!$spouse) {$spouse = new Spouse;}

        $retirement_fund = RetirementFund::afiIs($afid)->first();
        if (!$retirement_fund) {
            $last_retirement_fund = RetirementFund::whereYear('created_at', '=', $now->year)->where('deleted_at', '=', null)->orderBy('id', 'desc')->first();
            $now = Carbon::now();
            $retirement_fund = new RetirementFund;
            if ($last_retirement_fund) {
                $number_code = Util::separateCode($last_retirement_fund->code);
                $code = $number_code + 1;
            }else{
                $code = 1;
            }
            $retirement_fund->affiliate_id = $afid;
            $retirement_fund->save();
        }

        $applicant = Applicant::retirementFundIs($retirement_fund->id)->first();
        if (!$applicant) {$applicant = new Applicant;}

         $requirement = Requirement::modalityIs($retirement_fund->retirement_fund_modality_id)->get();
         $document = Document::retirementFundIs($retirement_fund->id)->get();
         $antecedent = Antecedent::retirementFundIs($retirement_fund->id)->get();

        if ($retirement_fund->retirement_fund_modality_id) {
            $info_gen = TRUE;
        }else{
            $info_gen = FALSE;
        }
        if ($applicant->identity_card) {
            $info_soli = TRUE;
        }else{
            $info_soli = FALSE;
        }
        if (Document::retirementFundIs($retirement_fund->id)->first()) {
            $info_docu = TRUE;
        }else{
            $info_docu = FALSE;
        }

        if (Antecedent::retirementFundIs($retirement_fund->id)->first()) {
            $info_antec = TRUE;
        }else{
            $info_antec = FALSE;
        }

        if ($retirement_fund->comment) {
            $info_obs = TRUE;
        }else{
            $info_obs = FALSE;
        }

        $lastContribution = Contribution::affiliateidIs($affiliate->id)->orderBy('month_year', 'desc')->first();
        $affiliate->service_start_date = $affiliate->date_entry;
        $affiliate->service_end_date = $lastContribution->month_year;

        $data = array(
            'affiliate' => $affiliate,
            'spouse' => $spouse,
            'retirement_fund' => $retirement_fund,
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
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('retirement_funds.view', self::getData($id));
    }


    public function print_ventanilla($afid)
    {
        $data = $this->getData($afid);
        $affiliate = $data['affiliate'];
        $requirement = $data['requirement'];
        $applicant = $data['applicant'];
        $document = $data['document'];
        $retirement_fund = $data['retirementfund'];
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
        $retirement_fund = $data['retirementfund'];
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
        $retirement_fund = $data['retirementfund'];
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
        $retirement_fund = $data['retirementfund'];
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

            $retirement_fund = RetirementFund::afiIs($id)->first();
            $affiliate = Affiliate::idIs($id)->first();

            switch ($request->type) {

                case 'gene':

                    if($request->modalidad == 4 && $affiliate->date_decommissioned == null)
                    {
                        $message = "Ingrese Fecha de deceso de Afiliado";
                    }
                    else{

                        if ($request->modalidad) {
                        $retirement_fund->retirement_fund_modality_id = trim($request->modalidad);
                        }
                        $retirement_fund->city_id = trim($request->departamento);
                        $retirement_fund->save();

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
                    if($retirement_fund->retirement_fund_modality_id)
                    {
                        foreach (json_decode($request->data) as $item)
                          {
                            $Document = Document::where('retirement_fund_id', '=', $retirement_fund->id)
                                            ->where('requirement_id', '=', $item->requisito_id)->first();

                            if (!$Document) {
                                $Document = new Document;
                                $Document->retirement_fund_id = $retirement_fund->id;
                                $Document->requirement_id = $item->requisito_id;
                            }
                            $Document->status = $item->booleanValue;
                            $Document->reception_date = date('Y-m-d');
                            $Document->save();

                            $retirement_fund->reception_date = date('Y-m-d');
                            $retirement_fund->save();
                        }

                        $message = "Información de requisitos de Fondo de Retiro actualizado con éxito";
                    }else{
                        $message = "Seleccione la modalidad y la ciudad";
                    }
                break;

                case 'antec':
                    foreach (json_decode($request->data) as $item)
                    {
                        $antecedent = Antecedent::where('retirement_fund_id', '=', $retirement_fund->id)
                                        ->where('antecedent_file_id', '=', $item->prestacion_id)->first();

                        if (!$antecedent) {
                            $antecedent = new Antecedent;
                            $antecedent->retirement_fund_id = $retirement_fund->id;
                            $antecedent->antecedent_file_id = $item->prestacion_id;
                        }

                        $antecedent->status = $item->booleanValue;
                        $antecedent->save();
                    }

                     $retirement_fund->check_file_date = date('Y-m-d');
                     $retirement_fund->save();

                    $message = "Información de requisitos de Fondo de Retiro actualizado con éxito";
                break;

                case 'periods':
                    $affiliate->service_start_date = Util::datePickPeriod($request->fech_ini_serv);
                    $affiliate->service_end_date = Util::datePickPeriod($request->fech_fin_serv);
                    $affiliate->save();

                    $retirement_fund->anticipation_start_date = Util::datePickPeriod($request->fech_ini_anti);
                    $retirement_fund->anticipation_end_date = Util::datePickPeriod($request->fech_fin_anti);

                    $retirement_fund->recognized_start_date = Util::datePickPeriod($request->fech_ini_reco);
                    $retirement_fund->recognized_end_date = Util::datePickPeriod($request->fech_fin_reco);
                    $retirement_fund->save();

                    $retirement_fund->qualification_date = date('Y-m-d');
                    $retirement_fund->save();

                    $message = "Información de Periodos de Aporte actualizado con éxito";
                break;

            }
            Session::flash('message', $message);
        }

        return redirect('tramite_fondo_retiro/'.$id);
    }

    public function destroy($afid)
    {
        $retirement_fund = RetirementFund::afiIs($afid)->first();
        $retirement_fund->delete();

        $message = "Trámite de Fondo de Retiro Eliminado";
        Session::flash('message', $message);
        return redirect('afiliado/'.$afid);
    }
}
