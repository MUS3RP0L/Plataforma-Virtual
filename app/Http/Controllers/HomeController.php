<?php

namespace Muserpol\Http\Controllers;

use Illuminate\Http\Request;

use Muserpol\Http\Requests;
use Muserpol\Http\Controllers\Controller;

use DB;
use Muserpol\Afiliado;
use Muserpol\Helper\Util;
use Carbon\Carbon;

use Muserpol\Activity;
use Muserpol\AfiState;
use Muserpol\Afitype;
use Muserpol\Aporte;
use Muserpol\FondoTramite;
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
      $AfiServ = DB::table('afiliados')
                    ->select(DB::raw('COUNT(*) totalAfiS'))
                    ->where('afiliados.afi_state_id', '=', 1)
                    ->get();

      foreach ($AfiServ as $item) {        
        $totalAfiServ = $item->totalAfiS;
      }

      $AfiComi = DB::table('afiliados')
                    ->select(DB::raw('COUNT(*) totalAfiC'))
                    ->where('afiliados.afi_state_id', '=', 2)
                    ->get();

      foreach ($AfiComi as $item) {        
        $totalAfiComi = $item->totalAfiC;
      }

      // gráficos por estados
      $estados = AfiState::all();
      $tipos = AfiType::all();
      $distritos = DB::table('unidades')->select(DB::raw('DISTINCT (unidades.dist) as dist'))->get(); 
      $anio = Carbon::now()->year;
     
      foreach ($estados as $item) {
        $afiestado = Afiliado::afiEstado($item->id,$anio)->first();
        $list_estados[$item->id] = $afiestado->total1;
      }

      foreach ($tipos as $item) {
        $Afitype = Afiliado::afiType($item->id,$anio)->first();
        $list_types[$item->id] = $Afitype->tipo;

      }  

      $ultimoAporte = DB::table('aportes')->orderBy('gest', 'desc')->first();
      $Ayear = Carbon::parse($ultimoAporte->gest)->subYears(5);
      $Ayear1 = Carbon::parse($Ayear)->year;
      $gestAportes = DB::table('aportes')->select(DB::raw('DISTINCT(year(aportes.gest)) as anio'))
                                    ->whereYear('aportes.gest', '>', $Ayear1)->orderBy('aportes.gest', 'asc')->get();

      foreach ($gestAportes as $item) {

        $monto = Aporte::afiAporte($item->anio)->first();
        $list_aportes[] = $monto->muserpol;
        $list_gestion[] = $monto->gestion;
        
      } 

      $AporteGestion = array($list_gestion, $list_aportes ); 
     
      foreach ($distritos as $item) {

        $Afidistrito = Afiliado::afiDistrito($item->dist, $anio)->first();
        $list_distrito[$item->dist] = $Afidistrito->distrito;
        
      } 

      //Nro. Tramites del ultimo semestre
      $fechactual = Carbon::now();
      $Fyear1 = Carbon::parse($fechactual)->year;

      $fondotramite = DB::table('fondo_tramites')
                            ->select(DB::raw('DISTINCT(month(fondo_tramites.fech_ven)) as mes'))
                            ->whereYear('fondo_tramites.fech_ven', '=', $Fyear1)
                            ->orderBy('fondo_tramites.fech_ven', 'asc')
                            ->get();
      if($fondotramite)
      {
        foreach ($fondotramite as $item) {
          $totalTramites = FondoTramite::nroTramites($item->mes,$Fyear1)->first();
          $list_ftgestion[] = Util::getMes($totalTramites->mes);
          $list_ftramites[] = $totalTramites->total; 
        }
        
      }
      
      $tramitesgestion = array($list_ftgestion, $list_ftramites); 

      
      

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
      'tramitesgestion' => $tramitesgestion
    ];

     return view('home', $data);    

	}
}
