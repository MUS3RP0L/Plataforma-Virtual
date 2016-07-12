<?php

namespace Muserpol\Http\Controllers;

use Illuminate\Http\Request;

use Muserpol\Http\Requests;
use Muserpol\Http\Controllers\Controller;

use DB;
use Muserpol\Affiliate;
use Muserpol\Helper\Util;
use Carbon\Carbon;

use Muserpol\Activity;
use Muserpol\AffiliateState;
use Muserpol\AffiliateType;
use Muserpol\Contribution;
use Muserpol\RetirementFund;
use Session;

class HomeController extends Controller
{
    /*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */

	public function showIndex()
	{
      $AfiServ = DB::table('affiliates')
                    ->select(DB::raw('COUNT(*) totalAfiS'))
                    ->where('affiliates.affiliate_state_id', '=', 1)
                    ->get();

      foreach ($AfiServ as $item) {        
        $totalAfiServ = $item->totalAfiS;
      }

      $AfiComi = DB::table('affiliates')
                    ->select(DB::raw('COUNT(*) totalAfiC'))
                    ->where('affiliates.affiliate_state_id', '=', 2)
                    ->get();

      foreach ($AfiComi as $item) {        
        $totalAfiComi = $item->totalAfiC;
      }

      // gráficos por estados
      $estados = AffiliateState::all();
      $tipos = AffiliateType::all();
      $distritos = DB::table('units')->select(DB::raw('DISTINCT (units.district) as dist'))->get(); 
      $anio = Carbon::now()->year;
     
      foreach ($estados as $item) {
        $afiestado = Affiliate::afiEstado($item->id,$anio)->first();
        $list_estados[$item->id] = $afiestado->total1;
      }

      foreach ($tipos as $item) {
        $Afitype = Affiliate::afiType($item->id,$anio)->first();
        $list_types[$item->id] = $Afitype->tipo;

      }  

      $ultimoAporte = DB::table('contributions')->orderBy('month_year', 'desc')->first();
      if($ultimoAporte)
      {
        $Ayear = Carbon::parse($ultimoAporte->month_year)->subYears(5);
        $Ayear1 = Carbon::parse($Ayear)->year;
        $gestAportes = DB::table('contributions')->select(DB::raw('DISTINCT(year(contributions.month_year)) as anio'))
                                    ->whereYear('contributions.month_year', '>', $Ayear1)->orderBy('contributions.month_year', 'asc')->get();

        foreach ($gestAportes as $item) {
          $monto = Contribution::afiAporte($item->anio)->first();
          $list_aportes[] = $monto->total;
          $list_gestion[] = $monto->month_year;
        
        }
        $AporteGestion = array($list_gestion, $list_aportes ); 
      }
      else
      {
        $list_aportes[] = 0;
        $list_gestion[] =0;
        $AporteGestion = array($list_gestion, $list_aportes );
      }
       
     
      foreach ($distritos as $item) {

        $Afidistrito = Affiliate::afiDistrito($item->dist, $anio)->first();
        $list_distrito[$item->dist] = $Afidistrito->distrito;
        
      } 

      //Nro. Tramites del ultimo año por mes
      $fechactual = Carbon::now();
      $Fyear1 = Carbon::parse($fechactual)->year;

      $fondotramite = DB::table('retirement_funds')
                            ->select(DB::raw('DISTINCT(month(retirement_funds.reception_date)) as mes'))
                            ->whereYear('retirement_funds.reception_date', '=', $Fyear1)
                            ->orderBy('retirement_funds.reception_date', 'asc')
                            ->get();
      if($fondotramite)
      {
        foreach ($fondotramite as $item) {
          $totalTramites = RetirementFund::nroTramites($item->mes,$Fyear1)->first();
          $list_ftgestion[] = Util::getMes($totalTramites->mes);
          $list_ftramites[] = $totalTramites->total; 
        }
        $tramitesgestion = array($list_ftgestion, $list_ftramites); 
      }
      else
      {
        $list_ftgestion[] = 0;
        $list_ftramites[] = 0;
        $tramitesgestion = array($list_ftgestion, $list_ftramites); 
      }
      
      //aporte voluntario gestion actual
      $fechactual = Carbon::now();
      $Fyear1 = Carbon::parse($fechactual)->year;

      $aportemeses = DB::table('contributions')
                            ->select(DB::raw('DISTINCT(month(contributions.month_year)) as mes1'))
                            ->where('contributions.contribution_type_id', '=', 2)
                            ->whereYear('contributions.month_year', '=', $Fyear1)
                            ->orderBy('contributions.month_year', 'asc')
                            ->get();

       if($aportemeses)
      {
        foreach ($aportemeses as $item) {
            $totalav = Contribution::aporteVoluntario($item->mes1, $Fyear1)->first();
            $list_avmeses[] = Util::getMes($totalav->mes);
            $list_totalav[] = $totalav->total;         
        }
        $aportevoluntario = array($list_avmeses, $list_totalav); 
      }
      else
      {
        $list_avmeses[] = 0;
        $list_totalav[] = 0;
        $aportevoluntario = array($list_avmeses, $list_totalav); 
      }
      

    $activities = Activity::orderBy('created_at', 'desc')->take(10)->get();
    $totalAfi = $totalAfiServ + $totalAfiComi;

    $data = [
      'activities' => $activities,
      'totalAfiServ' => $totalAfiServ,
      'totalAfiComi' => $totalAfiComi,
      'totalAfi' => $totalAfi,
      'list_estados' => $list_estados,
      'list_types' => $list_types,
      'list_distrito' => $list_distrito,
      'AporteGestion' => $AporteGestion,
      'tramitesgestion' => $tramitesgestion,
      'aportevoluntario' => $aportevoluntario,
      'Fyear1' => $Fyear1
    ];

     return view('home', $data);    
     // return response()->json($aportevoluntario);
	}
}
