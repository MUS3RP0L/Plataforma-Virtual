<?php

namespace Muserpol\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Validator;
use Session;
use Muserpol\Http\Requests;
use Muserpol\Http\Controllers\Controller;
use Muserpol\IpcTasa;
use Datatables;
use Muserpol\Helper\Util;
use Carbon\Carbon;

class IpcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();

        $ipcTasa = IpcTasa::where('mes', '=', $now->subMonth()->format('m'))
                               ->where('anio', '=', $now->format('Y'))->firstOrFail();

        $data = array(
            'subMonth' => Util::getMes($now->format('m')),
            'ipcTasa' => $ipcTasa,
            'month' => Util::getMes($now->addMonth()->format('m')),
            'meses' => Util::getAllMeses()
        );

        return view('ipc.index', $data);
    }

    public function ipctasasData()
    {
        $ipcs = IpcTasa::select(['mes', 'anio', 'ipc']);

        return Datatables::of($ipcs)
                ->editColumn('mes', function ($ipc) { return Util::getMes($ipc->mes); })
                ->editColumn('ipc', function ($ipc) { return Util::formatMoney($ipc->ipc); })
                ->make(true);
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

    public function save($request, $id = false)
    {
        $rules = [
            'anio' => 'required|numeric',
            'mes' => 'required|numeric',
            'ipc' => 'required|numeric'
        ];

        $messages = [

            'anio.required' => 'El campo Año no puede ser vacío', 
            'anio.numeric' => 'El campo Año sólo se aceptan números',

            'mes.required' => 'El campo Mes no puede ser vacío', 
            'mes.numeric' => 'El campo Mes sólo se aceptan números',

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

            $ipcTasa = IpcTasa::where('anio', '=', $request->anio)->where('mes', '=', $request->mes)->firstOrFail();

            $ipcTasa->user_id = Auth::user()->id;
            $ipcTasa->ipc = trim($request->ipc);

            $ipcTasa->save();
            if ($request->now) {
                $ipcTasa = IpcTasa::where('anio', '=', $request->anio)->where('mes', '=', Carbon::now()->format('m'))->firstOrFail();

                $ipcTasa->user_id = Auth::user()->id;
                $ipcTasa->ipc = trim($request->ipc);

                $ipcTasa->save();

            }


            $message = "Índice de Precios al Consumidor actualizado con éxito";

            Session::flash('message', $message);
        }
        
        return redirect('ipc');
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
