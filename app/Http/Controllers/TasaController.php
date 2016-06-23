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

use Muserpol\AporTasa;

class TasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aporTasaLast = AporTasa::orderBy('gest', 'desc')->first();

        $data = array(
            'aporTasaLast' => $aporTasaLast,
            'gest' => Util::getfullmonthYear($aporTasaLast->gest)
        );

        return view('tasas.index', $data);
    }

    public function tasasData()
    {
        $tasas = AporTasa::select(['gest', 'apor_a', 'apor_fr_a', 'apor_sv_a', 'apor_am_p']);

        return Datatables::of($tasas)
            ->editColumn('gest', function ($tasa) { return Carbon::parse($tasa->gest)->year; })
            ->addColumn('mes', function ($tasa) { return Util::getMes(Carbon::parse($tasa->gest)->month); })
            ->editColumn('apor_a', function ($tasa) { return Util::formatMoney($tasa->apor_a); })
            ->editColumn('apor_fr_a', function ($tasa) { return Util::formatMoney($tasa->apor_fr_a); })
            ->editColumn('apor_sv_a', function ($tasa) { return Util::formatMoney($tasa->apor_sv_a); })
            ->addColumn('apor_p', function ($tasa) { return Util::formatMoney($tasa->apor_am_p); })
            ->editColumn('apor_am_p', function ($tasa) { return Util::formatMoney($tasa->apor_am_p); })
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
