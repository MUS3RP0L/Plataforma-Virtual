<?php

namespace Muserpol\Http\Controllers;

use Illuminate\Http\Request;

use Muserpol\Http\Requests;
use Muserpol\Http\Controllers\Controller;

use DB;

use Muserpol\Activity;

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

      // graficas
      $aficomando = DB::table('afiliados')
                    ->select(DB::raw('COUNT(*) comando'))
                    ->where('afiliados.afi_type_id', '=', 1)
                    ->get();

      foreach ($aficomando as $item) {        
        $totalcomando = $item->comando;
      }

      $afibatallon = DB::table('afiliados')
                    ->select(DB::raw('COUNT(*) batallon'))
                    ->where('afiliados.afi_type_id', '=', 2)
                    ->get();

      foreach ($afibatallon as $item) {        
        $totalbatallon = $item->batallon;
      }

    $activities = Activity::orderBy('created_at', 'desc')->take(10)->get();
    $totalAfi = $totalAfiServ + $totalAfiComi;

    $data = [
      'activities' => $activities,
      'totalAfiServ' => $totalAfiServ,
      'totalAfiComi' => $totalAfiComi,
      'totalAfi' => $totalAfi,
      'totalcomando' => $totalcomando,
     'totalbatallon' => $totalbatallon
    ];

    return view('home', $data);

	}
}
