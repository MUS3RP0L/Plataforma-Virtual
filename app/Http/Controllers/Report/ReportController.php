<?php

namespace Muserpol\Http\Controllers\Report;

use Illuminate\Http\Request;
use Muserpol\Http\Requests;
use Muserpol\Http\Controllers\Controller;

use DB;
use Carbon\Carbon;
use Muserpol\Helper\Util;

use Muserpol\Contribution;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public static function getViewModel()
    {
        $years = DB::table('contributions')->select(DB::raw('DISTINCT YEAR(contributions.month_year ) years'))
                    ->orderBy('years', 'desc')->get();

        $years_list = [];
        foreach ($years as $item) {
            $years_list[$item->years]=$item->years;
        }

        $months_list = Util::getArrayMonths();

        return [

            'years_list' => $years_list,
            'months_list' => $months_list

        ];
    }

    public function ShowMonthlyReport()
    {
        $data = [

            'result' => false,
            'year' => '',
            'month' => ''
        ];

        $data = array_merge($data, self::getViewModel());

        return view('reports.monthly_report.index', $data);
    }

    public function GenerateMonthlyReport(Request $request)
    {
        $totalRegistrosC = DB::select('call sumar_aportesC(' . $request->month . ',' . $request->year . ')');

        foreach ($totalRegistrosC as $item) {
            $totalC = $item->total;
            $sueldoC = $item->sueldo;
            $antiC = $item->anti;
            $b_estC = $item->b_est;
            $b_carC = $item->b_car;
            $b_froC = $item->b_fro;
            $b_oriC = $item->b_ori;
            $b_segC = $item->b_seg;
            $ganC = $item->gan;
            $cotC = $item->cot;
            $frC = $item->fr;
            $svC = $item->sv;
            $musC = $item->mus;
        }

        $totalRegistrosB = DB::select('call sumar_aportesB(' . $request->month . ',' . $request->year . ')');

        foreach ($totalRegistrosB as $item) {
            $totalB = $item->total;
            $sueldoB = $item->sueldo;
            $antiB = $item->anti;
            $b_estB = $item->b_est;
            $b_carB = $item->b_car;
            $b_froB = $item->b_fro;
            $b_oriB = $item->b_ori;
            $b_segB = $item->b_seg;
            $ganB = $item->gan;
            $cotB = $item->cot;
            $frB = $item->fr;
            $svB = $item->sv;
            $musB = $item->mus;
        }

        $total = $totalC + $totalB;
        $sueldo = $sueldoC + $sueldoB;
        $anti = $antiC + $antiB;
        $b_est = $b_estC + $b_estB;
        $b_car = $b_carC + $b_carB;
        $b_fro = $b_froC + $b_froB;
        $b_ori = $b_oriC + $b_oriB;
        $b_seg = $b_segC + $b_segB;
        $gan = $ganC + $ganB;
        $cot = $cotC + $cotB;
        $fr = $frC + $frB;
        $sv = $svC + $svB;
        $mus = $musC + $musB;

        $data_years = $this->getViewModel();

        $data = [

            'total' => Util::formatMoney($total),
            'totalSueldoC' => Util::formatMoney($sueldoC),
            'totalSueldoB' => Util::formatMoney($sueldoB),
            'totalSueldo' => Util::formatMoney($sueldo),
            'totalAntiC' => Util::formatMoney($antiC),
            'totalAntiB' => Util::formatMoney($antiB),
            'totalAnti' => Util::formatMoney($anti),
            'totalB_estC' => Util::formatMoney($b_estC),
            'totalB_estB' => Util::formatMoney($b_estB),
            'totalB_est' => Util::formatMoney($b_est),
            'totalB_carC' => Util::formatMoney($b_carC),
            'totalB_carB' => Util::formatMoney($b_carB),
            'totalB_car' => Util::formatMoney($b_car),
            'totalB_froC' => Util::formatMoney($b_froC),
            'totalB_froB' => Util::formatMoney($b_froB),
            'totalB_fro' => Util::formatMoney($b_fro),
            'totalB_oriC' => Util::formatMoney($b_oriC),
            'totalB_oriB' => Util::formatMoney($b_oriB),
            'totalB_ori' => Util::formatMoney($b_ori),
            'totalB_segC' => Util::formatMoney($b_segC),
            'totalB_segB' => Util::formatMoney($b_segB),
            'totalB_seg' => Util::formatMoney($b_seg),
            'totalGanadoC' => Util::formatMoney($ganC),
            'totalGanadoB' => Util::formatMoney($ganB),
            'totalGanado' => Util::formatMoney($gan),
            'totalCotiC' => Util::formatMoney($cotC),
            'totalCotiB' => Util::formatMoney($cotB),
            'totalCoti' => Util::formatMoney($cot),
            'totalFrC' => Util::formatMoney($frC),
            'totalFrB' => Util::formatMoney($frB),
            'totalFr' => Util::formatMoney($fr),
            'totalSvC' => Util::formatMoney($svC),
            'totalSvB' => Util::formatMoney($svB),
            'totalSv' => Util::formatMoney($sv),
            'totalMuserpolC' => Util::formatMoney($musC),
            'totalMuserpolB' => Util::formatMoney($musB),
            'totalMuserpol' => Util::formatMoney($mus),
            'year' => $request->year,
            'month' => $request->month,
            'result' => true

        ];

        $data = array_merge($data, self::getViewModel());

        return view('reports.monthly_report.index', $data);
    }
}
