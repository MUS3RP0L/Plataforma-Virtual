<?php

namespace Muserpol\Http\Controllers;

use Illuminate\Http\Request;

use Muserpol\Http\Requests;
use Muserpol\Http\Controllers\Controller;
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

      $select = DB::raw('COUNT (DISTINCT afiliados.id) totalAfiServ')
      $totalAfiServ = DB::table('afiliados')
                    ->select($select)
  //       $totalRegistros = DB::table('aportes')
  //               ->select(DB::raw('COUNT(*) registros, SUM(aportes.sue) sueldo, SUM(aportes.b_ant) anti,
  //                               SUM(aportes.b_est) b_est, SUM(aportes.b_car) b_car,
  //                               SUM(aportes.b_fro) b_fro, SUM(aportes.b_ori) b_ori,
  //                               SUM(aportes.b_seg) b_seg, SUM(aportes.gan) gan, SUM(aportes.mus) mus'))
  //                               ->where('aportes.mes', '=', $request->mes)
  //                               ->where('aportes.anio', '=', $anio)
  //                                   ->get();
  //       foreach ($totalRegistros as $item) {
  //           $registros = $item->registros;
  //           $sueldo = $item->sueldo;
  //           $anti = $item->anti;
  //           $b_est = $item->b_est;
  //           $b_car = $item->b_car;
  //           $b_fro = $item->b_fro;
  //           $b_ori = $item->b_ori;
  //           $b_seg = $item->b_seg;
  //           $gan = $item->gan;
  //           $mus = $item->mus;
  //       }

    $activities = Activity::orderBy('created_at', 'desc')->take(10)->get();
    
    $data = [
      'activities' => $activities,
      // 'totalRegistros' => $registros,
      // 'totalSueldo' => Util::formatMoney($sueldo),
    ];

    return view('home', $data);

	}
}
