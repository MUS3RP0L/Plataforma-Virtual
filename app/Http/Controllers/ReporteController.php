<?php

namespace Muserpol\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Session;
use Muserpol\Http\Requests;
use Muserpol\Http\Controllers\Controller;
use Muserpol\Aporte;
use Muserpol\Grado;
use Muserpol\Helper\Util;
use Carbon\Carbon;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ReportAporteMonth()
    {
        $anios = DB::table('aportes')->select(DB::raw('DISTINCT YEAR(aportes.gest ) gest'))->lists('gest');


        foreach ($grados as $item) {
             $list_grados[$item->id]=$item->niv. "-" .$item->grad . " | " . $item->lit;
        } 

        $data = array(
            'anios' => $anios,
            'meses' => Util::getAllMeses(),
            'resultado' => 0,

        );
        return view('reportes.view', $data);
    }

    public function GenerateReportAporteMonth(Request $request)
    {

        $anios = DB::table('aportes')->select(DB::raw('DISTINCT (aportes.anio ) anio'))->get();
        $i=0; $a = $request->anio;
        foreach ($anios as $item) {
            $anio = $item->anio;
            if($i==$a)
            {break;}
            $i++;
        }

        $totalRegistros = DB::table('aportes')
                ->select(DB::raw('COUNT(*) registros, SUM(aportes.sue) sueldo, SUM(aportes.b_ant) anti,
                                SUM(aportes.b_est) b_est, SUM(aportes.b_car) b_car,
                                SUM(aportes.b_fro) b_fro, SUM(aportes.b_ori) b_ori,
                                SUM(aportes.b_seg) b_seg, SUM(aportes.gan) gan, SUM(aportes.mus) mus'))
                                ->where('aportes.mes', '=', $request->mes)
                                ->where('aportes.anio', '=', $anio)
                                    ->get();
        foreach ($totalRegistros as $item) {
            $registros = $item->registros;
            $sueldo = $item->sueldo;
            $anti = $item->anti;
            $b_est = $item->b_est;
            $b_car = $item->b_car;
            $b_fro = $item->b_fro;
            $b_ori = $item->b_ori;
            $b_seg = $item->b_seg;
            $gan = $item->gan;
            $mus = $item->mus;
        }

        $anios = array('9' => '19','0' => '20','1' => '20','2' => '20','3' => '20');
        $a = substr($anio, 0, 1);
        $meses = array('01' => 'Enero','02' => 'Febrero','03' => 'Marzo','04' => 'Abril','05' => 'Mayo','06' => 'Junio','07' => 'Julio','08' => 'Agosto','09' => 'Septiembre','10' => 'Octubre','11' => 'Noviembre','12' => 'Diciembre');

        $data = array(
            'totalRegistros' => $registros,
            'totalSueldo' => Util::formatMoney($sueldo),
            'totalAnti' => Util::formatMoney($anti),
            'totalB_est' => Util::formatMoney($b_est),
            'totalB_car' => Util::formatMoney($b_car),
            'totalB_fro' => Util::formatMoney($b_fro),
            'totalB_ori' => Util::formatMoney($b_ori),
            'totalB_seg' => Util::formatMoney($b_seg),
            'totalGanado' => Util::formatMoney($gan),
            'totalMuserpol' => Util::formatMoney($mus),
            'anio' => $anios[$a] . $anio,
            'mes' => $meses[$request->mes]
        );

        return view('reportes.show', $data);
    }

    public function ReportAporte()
    {
        $anios = DB::table('aportes')->select(DB::raw('DISTINCT YEAR(aportes.gest ) gest'))->lists('gest');

        $grados = Grado::all();

        foreach ($grados as $item) {
             $list_grados[$item->id]=$item->niv. "-" .$item->grad . " | " . $item->lit;
        } 

        $data = array(
            'anios' => $anios,
            // 'meses' => Util::getAllMeses(),
            'resultado' => 0,
            'list_grados' => $list_grados,

        );
        return view('reportes.view', $data);
    }
    
    public function GenerateReportAporte(Request $request)
    {
        
        $years = DB::table('aportes')->select(DB::raw('DISTINCT YEAR(aportes.gest) gest'))->get('gest');

        $grado = Grado::where('id', '=', $request->grado_id)->first();

        $i=0; $a = $request->year;
        foreach ($years as $item) {
            $yearl = $item->gest;
            if($i==$a)
            {break;}
            $i++;
        }

        $totalRegistros = DB::table('aportes')
                ->select(DB::raw('COUNT(DISTINCT(afiliado_id)) registros'))
                                ->where('aportes.grado_id', '=', $request->grado_id)
                                ->whereYear('aportes.gest', '=', $yearl)  
                                ->get();
        foreach ($totalRegistros as $item) {
            $registros = $item->registros;
        }






        $totalRegistros1 = DB::table('aportes')
                ->select(DB::raw('AVG(aportes.mus) avg'))
                                ->where('aportes.grado_id', '=', $request->grado_id)
                                ->whereMonth('aportes.gest', '=', 1)
                                ->whereYear('aportes.gest', '=', $yearl)  
                                ->get();
        foreach ($totalRegistros1 as $item) {
            $avg1 = $item->avg;
        }

        $totalRegistros2 = DB::table('aportes')
                ->select(DB::raw('AVG(aportes.mus) avg'))
                                ->where('aportes.grado_id', '=', $request->grado_id)
                                ->whereMonth('aportes.gest', '=', 2)
                                ->whereYear('aportes.gest', '=', $yearl)  
                                ->get();
        foreach ($totalRegistros2 as $item) {
            $avg2 = $item->avg;
        }

        $totalRegistros3 = DB::table('aportes')
                ->select(DB::raw('AVG(aportes.mus) avg'))
                                ->where('aportes.grado_id', '=', $request->grado_id)
                                ->whereMonth('aportes.gest', '=', 3)
                                ->whereYear('aportes.gest', '=', $yearl)  
                                ->get();
        foreach ($totalRegistros3 as $item) {
            $avg3 = $item->avg;
        }

        $totalRegistros4 = DB::table('aportes')
                ->select(DB::raw('AVG(aportes.mus) avg'))
                                ->where('aportes.grado_id', '=', $request->grado_id)
                                ->whereMonth('aportes.gest', '=', 4)
                                ->whereYear('aportes.gest', '=', $yearl)  
                                ->get();
        foreach ($totalRegistros4 as $item) {
            $avg4 = $item->avg;
        }

        $totalRegistros5 = DB::table('aportes')
                ->select(DB::raw('AVG(aportes.mus) avg'))
                                ->where('aportes.grado_id', '=', $request->grado_id)
                                ->whereMonth('aportes.gest', '=', 5)
                                ->whereYear('aportes.gest', '=', $yearl)  
                                ->get();
        foreach ($totalRegistros5 as $item) {
            $avg5 = $item->avg;
        }

        $totalRegistros6 = DB::table('aportes')
                ->select(DB::raw('AVG(aportes.mus) avg'))
                                ->where('aportes.grado_id', '=', $request->grado_id)
                                ->whereMonth('aportes.gest', '=', 6)
                                ->whereYear('aportes.gest', '=', $yearl)  
                                ->get();
        foreach ($totalRegistros6 as $item) {
            $avg6 = $item->avg;
        }

        $totalRegistros7 = DB::table('aportes')
                ->select(DB::raw('AVG(aportes.mus) avg'))
                                ->where('aportes.grado_id', '=', $request->grado_id)
                                ->whereMonth('aportes.gest', '=', 7)
                                ->whereYear('aportes.gest', '=', $yearl)  
                                ->get();
        foreach ($totalRegistros7 as $item) {
            $avg7 = $item->avg;
        }

        $totalRegistros8 = DB::table('aportes')
                ->select(DB::raw('AVG(aportes.mus) avg'))
                                ->where('aportes.grado_id', '=', $request->grado_id)
                                ->whereMonth('aportes.gest', '=', 8)
                                ->whereYear('aportes.gest', '=', $yearl)  
                                ->get();
        foreach ($totalRegistros8 as $item) {
            $avg8 = $item->avg;
        }

        $totalRegistros9 = DB::table('aportes')
                ->select(DB::raw('AVG(aportes.mus) avg'))
                                ->where('aportes.grado_id', '=', $request->grado_id)
                                ->whereMonth('aportes.gest', '=', 9)
                                ->whereYear('aportes.gest', '=', $yearl)  
                                ->get();
        foreach ($totalRegistros9 as $item) {
            $avg9 = $item->avg;
        }

        $totalRegistros10 = DB::table('aportes')
                ->select(DB::raw('AVG(aportes.mus) avg'))
                                ->where('aportes.grado_id', '=', $request->grado_id)
                                ->whereMonth('aportes.gest', '=', 10)
                                ->whereYear('aportes.gest', '=', $yearl)  
                                ->get();
        foreach ($totalRegistros10 as $item) {
            $avg10 = $item->avg;
        }
        $totalRegistros11 = DB::table('aportes')
                ->select(DB::raw('AVG(aportes.mus) avg'))
                                ->where('aportes.grado_id', '=', $request->grado_id)
                                ->whereMonth('aportes.gest', '=', 11)
                                ->whereYear('aportes.gest', '=', $yearl)  
                                ->get();
        foreach ($totalRegistros11 as $item) {
            $avg11 = $item->avg;
        }

        $totalRegistros12 = DB::table('aportes')
                ->select(DB::raw('AVG(aportes.mus) avg'))
                                ->where('aportes.grado_id', '=', $request->grado_id)
                                ->whereMonth('aportes.gest', '=', 12)
                                ->whereYear('aportes.gest', '=', $yearl)  
                                ->get();
        foreach ($totalRegistros12 as $item) {
            $avg12 = $item->avg;
        }

        $data = array(
            'totalRegistros' => $registros,
            'avg' => Util::formatMoney($avg1+$avg2+$avg3+$avg4+$avg5+$avg6+$avg7+$avg8+$avg9+$avg10+$avg11+$avg12),
            'anio' => $yearl,
            'grado' => $grado,
        );

        return view('reportes.show', $data);
    }

    // public function GenerateReportAporte(Request $request)
    // {

    //     $anios = DB::table('aportes')->select(DB::raw('DISTINCT (aportes.anio ) anio'))->get();
    //     $i=0; $a = $request->anio;
    //     foreach ($anios as $item) {
    //         $anio = $item->anio;
    //         if($i==$a)
    //         {break;}
    //         $i++;
    //     }

    //     $totalRegistros = DB::table('aportes')
    //             ->select(DB::raw('COUNT(*) registros, SUM(aportes.sue) sueldo, SUM(aportes.b_ant) anti,
    //                             SUM(aportes.b_est) b_est, SUM(aportes.b_car) b_car,
    //                             SUM(aportes.b_fro) b_fro, SUM(aportes.b_ori) b_ori,
    //                             SUM(aportes.b_seg) b_seg, SUM(aportes.gan) gan, SUM(aportes.mus) mus'))
    //                             ->where('aportes.mes', '=', $request->mes)
    //                             ->where('aportes.anio', '=', $anio)
    //                                 ->get();
    //     foreach ($totalRegistros as $item) {
    //         $registros = $item->registros;
    //         $sueldo = $item->sueldo;
    //         $anti = $item->anti;
    //         $b_est = $item->b_est;
    //         $b_car = $item->b_car;
    //         $b_fro = $item->b_fro;
    //         $b_ori = $item->b_ori;
    //         $b_seg = $item->b_seg;
    //         $gan = $item->gan;
    //         $mus = $item->mus;
    //     }

    //     $anios = array('9' => '19','0' => '20','1' => '20','2' => '20','3' => '20');
    //     $a = substr($anio, 0, 1);
    //     $meses = array('01' => 'Enero','02' => 'Febrero','03' => 'Marzo','04' => 'Abril','05' => 'Mayo','06' => 'Junio','07' => 'Julio','08' => 'Agosto','09' => 'Septiembre','10' => 'Octubre','11' => 'Noviembre','12' => 'Diciembre');

    //     $data = array(
    //         'totalRegistros' => $registros,
    //         'totalSueldo' => Util::formatMoney($sueldo),
    //         'totalAnti' => Util::formatMoney($anti),
    //         'totalB_est' => Util::formatMoney($b_est),
    //         'totalB_car' => Util::formatMoney($b_car),
    //         'totalB_fro' => Util::formatMoney($b_fro),
    //         'totalB_ori' => Util::formatMoney($b_ori),
    //         'totalB_seg' => Util::formatMoney($b_seg),
    //         'totalGanado' => Util::formatMoney($gan),
    //         'totalMuserpol' => Util::formatMoney($mus),
    //         'anio' => $anios[$a] . $anio,
    //         'mes' => $meses[$request->mes]
    //     );

    //     return view('reportes.show', $data);
    // }

}
