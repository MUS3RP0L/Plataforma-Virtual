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
use Muserpol\IpcTasa;

class IpcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ipcTasaLast = IpcTasa::orderBy('gest', 'desc')->first();
        $ipcTasaLast->year = Carbon::parse($ipcTasaLast->gest)->year;
        $ipcTasaLast->month = Carbon::parse($ipcTasaLast->gest)->month;

        $data = array(
            'ipcTasaLast' => $ipcTasaLast,
            'meses' => Util::getAllMeses()
        );

        return view('ipc.index', $data);
    }

    public function ipctasasData()
    {
        $ipcs = IpcTasa::select(['gest', 'ipc']);

        return Datatables::of($ipcs)
                ->editColumn('gest', function ($ipc) { return Carbon::parse($ipc->gest)->year; })
                ->addColumn('mes', function ($ipc) { return Util::getMes(Carbon::parse($ipc->gest)->month); })
                ->editColumn('ipc', function ($ipc) { return Util::formatMoney($ipc->ipc); })
                ->make(true);
    }

    public function save($request, $id = false)
    {
        $rules = [
            'year' => 'required|numeric',
            'month' => 'required|numeric',
            'ipc' => 'required|numeric'
        ];

        $messages = [

            'year.required' => 'El campo Año no puede ser vacío', 
            'year.numeric' => 'El campo Año sólo se aceptan números',

            'month.required' => 'El campo Mes no puede ser vacío', 
            'month.numeric' => 'El campo Mes sólo se aceptan números',

            'ipc.required' => 'El campo IPC no puede ser vacío', 
            'ipc.numeric' => 'El campo IPC sólo se aceptan números'

        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()){
            return redirect('ipc')
            ->withErrors($validator)
            ->withInput();
        }
        else{

            $ipcTasa = IpcTasa::where('gest', '=', Carbon::createFromDate($request->year, $request->month, 1)->toDateString())->first();

            if ($ipcTasa) {
                $ipcTasa->user_id = Auth::user()->id;
                $ipcTasa->ipc = trim($request->ipc);

                $ipcTasa->save();

                $message = "Índice de Precios al Consumidor actualizado con éxito";

                Session::flash('message', $message);
            }
            else
            {
                $message = "Fecha no disponible";
                Session::flash('message', $message);
            }

        }
        
        return redirect('ipc');
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

}
