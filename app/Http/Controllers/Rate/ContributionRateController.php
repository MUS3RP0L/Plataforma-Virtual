<?php

namespace Muserpol\Http\Controllers\Rate;

use Illuminate\Http\Request;
use Muserpol\Http\Requests;
use Muserpol\Http\Controllers\Controller;

use Auth;
use Validator;
use Session;
use Datatables;
use Carbon\Carbon;
use Muserpol\Helper\Util;

use Muserpol\ContributionRate;

class ContributionRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $last_contribution_rate = ContributionRate::orderBy('month_year', 'desc')->first();

        $data = array(
            'last_contribution_rate' => $last_contribution_rate,
            'month_year' => Util::getfullmonthYear($last_contribution_rate->month_year)
        );

        return view('contribution_rates.index', $data);
    }

    public function Data()
    {
        $contribution_rates = ContributionRate::select(['month_year', 'rate_active', 'retirement_fund', 'life_insurance', 'rate_passive']);

        return Datatables::of($contribution_rates)
            ->addColumn('year', function ($contribution_rate) { return Carbon::parse($contribution_rate->month_year)->year; })
            ->addColumn('month', function ($contribution_rate) { return Util::getMes(Carbon::parse($contribution_rate->month_year)->month); })
            ->editColumn('rate_active', function ($contribution_rate) { return Util::formatMoney($contribution_rate->rate_active); })
            ->editColumn('retirement_fund', function ($contribution_rate) { return Util::formatMoney($contribution_rate->retirement_fund); })
            ->editColumn('life_insurance', function ($contribution_rate) { return Util::formatMoney($contribution_rate->life_insurance); })
            ->addColumn('rate_passive', function ($contribution_rate) { return Util::formatMoney($contribution_rate->rate_passive); })
            ->editColumn('mortuary_aid', function ($contribution_rate) { return Util::formatMoney($contribution_rate->rate_passive); })
            ->make(true);
    }

    public function save($request, $id = false)
    {
        $rules = [
            'apor_fr_a' => 'required|numeric',
            'apor_sv_a' => 'required|numeric',
            'apor_am_p' => 'required|numeric'

        ];

        $messages = [

            'apor_fr_a.required' => 'El campo Fondo de Retiro Sector Activo no puede ser vacío', 
            'apor_fr_a.numeric' => 'El campo Fondo de Retiro Sector Activo sólo se aceptan números',

            'apor_sv_a.required' => 'El campo Seguro de Vida Sector Activo no puede ser vacío', 
            'apor_sv_a.numeric' => 'El campo Seguro de Vida Sector Activo sólo se aceptan números',

            'apor_am_p.required' => 'El campo Seguro de Vida Sector Pasivo no puede ser vacío', 
            'apor_am_p.numeric' => 'El campo Seguro de Vida Sector Pasivo sólo se aceptan números',

        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()){
            return redirect('tasa/'.$id.'/edit')
            ->withErrors($validator)
            ->withInput();
        }
        else{

            $aporTasa = AporTasa::where('id', '=', $id)->first();

            $aporTasa->user_id = Auth::user()->id;
                  
            $aporTasa->apor_fr_a = trim($request->apor_fr_a);
            $aporTasa->apor_sv_a = trim($request->apor_sv_a);
            $aporTasa->apor_a = trim($request->apor_fr_a) + trim($request->apor_sv_a);
            
            $aporTasa->apor_am_p = trim($request->apor_am_p);

            $aporTasa->save();

            $message = "Tasa de Aporte Actualizado con éxito";

            Session::flash('message', $message);
        }
        
        return redirect('tasa');
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
        if (Auth::user()->can('admin')) {
            return $this->save($request, $id);
        }else{
            return redirect('/');
        }
    }
}
