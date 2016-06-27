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
use Maatwebsite\Excel\Facades\Excel;

use Muserpol\Sueldo;

class SueldoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sueldos.index');
    }

    public function sueldoPriData()
    {
        $select = DB::raw('sueldos.gest as gest, c1.sue as c1, c2.sue as c2, c3.sue as c3, c4.sue as c4, c5.sue as c5, c6.sue as c6, c7.sue as c7, c8.sue as c8, c9.sue as c9, c10.sue as c10, c11.sue as c11, c12.sue as c12');
        
        $results = DB::table('sueldos')->select($select)
        ->leftJoin('sueldos as c1', 'c1.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c2', 'c2.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c3', 'c3.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c4', 'c4.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c5', 'c5.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c6', 'c6.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c7', 'c7.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c8', 'c8.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c9', 'c9.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c10', 'c10.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c11', 'c11.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c12', 'c12.gest', '=', 'sueldos.gest')
        ->where('c1.grado_id', '=', '1')
        ->where('c2.grado_id', '=', '2')
        ->where('c3.grado_id', '=', '3')
        ->where('c4.grado_id', '=', '4')
        ->where('c5.grado_id', '=', '5')
        ->where('c6.grado_id', '=', '6')
        ->where('c7.grado_id', '=', '7')
        ->where('c8.grado_id', '=', '8')
        ->where('c9.grado_id', '=', '9')
        ->where('c10.grado_id', '=', '10')
        ->where('c11.grado_id', '=', '11')
        ->where('c12.grado_id', '=', '12')
        ->groupBy('sueldos.gest');

        return Datatables::of($results)
        ->editColumn('gest', function ($tasa) { return Carbon::parse($tasa->gest)->year; })
        ->editColumn('c1', function ($result) { return Util::formatMoney($result->c1); })
        ->editColumn('c2', function ($result) { return Util::formatMoney($result->c2); })
        ->editColumn('c3', function ($result) { return Util::formatMoney($result->c3); })
        ->editColumn('c4', function ($result) { return Util::formatMoney($result->c4); })
        ->editColumn('c5', function ($result) { return Util::formatMoney($result->c5); })
        ->editColumn('c6', function ($result) { return Util::formatMoney($result->c6); })
        ->editColumn('c7', function ($result) { return Util::formatMoney($result->c7); })
        ->editColumn('c8', function ($result) { return Util::formatMoney($result->c8); })
        ->editColumn('c9', function ($result) { return Util::formatMoney($result->c9); })
        ->editColumn('c10', function ($result) { return Util::formatMoney($result->c10); })
        ->editColumn('c11', function ($result) { return Util::formatMoney($result->c11); })
        ->editColumn('c12', function ($result) { return Util::formatMoney($result->c12); })
        ->make(true);
    }

    public function sueldoSegData()
    {
        $select = DB::raw('sueldos.gest as gest, c13.sue as c13, c14.sue as c14, c15.sue as c15, c16.sue as c16, c17.sue as c17,c18.sue as c18');
        
        $result = DB::table('sueldos')->select($select)
        ->leftJoin('sueldos as c13', 'c13.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c14', 'c14.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c15', 'c15.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c16', 'c16.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c17', 'c17.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c18', 'c18.gest', '=', 'sueldos.gest')
        ->where('c13.grado_id', '=', '13')
        ->where('c14.grado_id', '=', '14')
        ->where('c15.grado_id', '=', '15')
        ->where('c16.grado_id', '=', '16')
        ->where('c17.grado_id', '=', '17')
        ->where('c18.grado_id', '=', '18')
        ->groupBy('sueldos.gest');

        return Datatables::of($result)
        ->editColumn('gest', function ($tasa) { return Carbon::parse($tasa->gest)->year; })
        ->editColumn('c13', function ($result) { return Util::formatMoney($result->c13); })
        ->editColumn('c14', function ($result) { return Util::formatMoney($result->c14); })
        ->editColumn('c15', function ($result) { return Util::formatMoney($result->c15); })
        ->editColumn('c16', function ($result) { return Util::formatMoney($result->c16); })
        ->editColumn('c17', function ($result) { return Util::formatMoney($result->c17); })
        ->editColumn('c18', function ($result) { return Util::formatMoney($result->c18); })
        ->make(true);
    }

    public function sueldoTerData()
    {
        $select = DB::raw('sueldos.gest as gest, c19.sue as c19, c20.sue as c20, c21.sue as c21, c22.sue as c22, c23.sue as c23, c24.sue as c24, c25.sue as c25, c26.sue as c26');
        
        $result = DB::table('sueldos')->select($select)
        ->leftJoin('sueldos as c19', 'c19.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c20', 'c20.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c21', 'c21.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c22', 'c22.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c23', 'c23.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c24', 'c24.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c25', 'c25.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c26', 'c26.gest', '=', 'sueldos.gest')
        ->where('c19.grado_id', '=', '19')
        ->where('c20.grado_id', '=', '20')
        ->where('c21.grado_id', '=', '21')
        ->where('c22.grado_id', '=', '22')
        ->where('c23.grado_id', '=', '23')
        ->where('c24.grado_id', '=', '24')
        ->where('c25.grado_id', '=', '25')
        ->where('c26.grado_id', '=', '26')
        ->groupBy('sueldos.gest');

        return Datatables::of($result)
        ->editColumn('gest', function ($tasa) { return Carbon::parse($tasa->gest)->year; })
        ->editColumn('c19', function ($result) { return Util::formatMoney($result->c19); })
        ->editColumn('c20', function ($result) { return Util::formatMoney($result->c20); })
        ->editColumn('c21', function ($result) { return Util::formatMoney($result->c21); })
        ->editColumn('c22', function ($result) { return Util::formatMoney($result->c22); })
        ->editColumn('c23', function ($result) { return Util::formatMoney($result->c23); })
        ->editColumn('c24', function ($result) { return Util::formatMoney($result->c24); })
        ->editColumn('c25', function ($result) { return Util::formatMoney($result->c25); })
        ->editColumn('c26', function ($result) { return Util::formatMoney($result->c26); })
        ->make(true);
    }

    public function sueldoCuaData()
    {
        $select = DB::raw('sueldos.gest as gest, c27.sue as c27, c28.sue as c28, c29.sue as c29, c30.sue as c30, c31.sue as c31, c32.sue as c32, c33.sue as c33, c34.sue as c34');
        
        $result = DB::table('sueldos')->select($select)
        ->leftJoin('sueldos as c27', 'c27.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c28', 'c28.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c29', 'c29.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c30', 'c30.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c31', 'c31.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c32', 'c32.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c33', 'c33.gest', '=', 'sueldos.gest')
        ->leftJoin('sueldos as c34', 'c34.gest', '=', 'sueldos.gest')
        ->where('c27.grado_id', '=', '27')
        ->where('c28.grado_id', '=', '28')
        ->where('c29.grado_id', '=', '29')
        ->where('c30.grado_id', '=', '30')
        ->where('c31.grado_id', '=', '31')
        ->where('c32.grado_id', '=', '32')
        ->where('c33.grado_id', '=', '33')
        ->where('c34.grado_id', '=', '34')
        ->groupBy('sueldos.gest');

        return Datatables::of($result)
        ->editColumn('gest', function ($tasa) { return Carbon::parse($tasa->gest)->year; })
        ->editColumn('c27', function ($result) { return Util::formatMoney($result->c27); })
        ->editColumn('c28', function ($result) { return Util::formatMoney($result->c28); })
        ->editColumn('c29', function ($result) { return Util::formatMoney($result->c29); })
        ->editColumn('c30', function ($result) { return Util::formatMoney($result->c30); })
        ->editColumn('c31', function ($result) { return Util::formatMoney($result->c31); })
        ->editColumn('c32', function ($result) { return Util::formatMoney($result->c32); })
        ->editColumn('c33', function ($result) { return Util::formatMoney($result->c33); })
        ->editColumn('c34', function ($result) { return Util::formatMoney($result->c34); })
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sueldos.import');
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->save($request);
    }

    public function save($request, $id = false)
    {
        global $gest, $results;

        $reader = $request->file('archive');
        $filename = $reader->getRealPath();

        $gest = $request->gest;

        Excel::load($filename, function($reader) {
            global $gest, $results;
    
            ini_set('upload_max_filesize', '9999M');
            ini_set('post_max_size', '9999M');
            ini_set('max_execution_time', '-1');
            ini_set('max_input_time', '-1');
            ini_set('memory_limit', '-1');
            set_time_limit(36000);
            $results = collect( $reader->all());
        });

        $grados = DB::table('grados')
                -> orderBy('id','asc')->get();
       
        foreach ($grados as $item) {
           
          foreach ($results as $datos) {
              if($datos['niv'] == $item->niv && $datos['gra'] == $item->grad && Util::decimal($datos['sue'])<> 0)
              {     
                    $fecha = Util::datePickPeriod($gest);
                    $year = Carbon::parse($fecha)->year;
                    $month = Carbon::parse($fecha)->month;

                    $sueldo =  DB::table('sueldos')
                            ->select(DB::raw('sueldos.id,sueldos.user_id,sueldos.grado_id,grados.niv,grados.grad, sueldos.gest'))
                            ->leftJoin('grados', 'sueldos.grado_id', '=', 'grados.id')
                            ->where('niv', '=', $item->niv)
                            ->where('grad', '=', $item->grad)
                            ->whereMonth('gest', '=', $month)
                            ->whereYear('gest', '=', $year)
                            ->first(); 
                    if(!$sueldo)
                    { 
                        $sueldos = new Sueldo;
                        $sueldos->user_id = Auth::user()->id;
                        $sueldos->grado_id = $item->id;
                        $sueldos->gest = Util::datePickPeriod($gest);
                        $sueldos->sue = Util::decimal($datos['sue']); 
                        $sueldos->save();
                    }
                    break; 
              } 
              
          }
           
        }
        Session::flash('message', "Sueldos importados exitosamente !!");
        return redirect('sueldo');
    }
}

