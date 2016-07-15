<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

Route::group(['middleware' => 'auth'], function() {

	// User Management
	Route::resource('user', 'User\UserController');
	Route::get('user/block/{user}', 'User\UserController@Block');
	Route::get('user/unblock/{user}', 'User\UserController@Unblock');
	Route::get('get_user', array('as'=>'get_user', 'uses'=>'User\UserController@Data'));

	// Contribution Rate
	Route::resource('contribution_rate', 'Rate\ContributionRateController');
	Route::get('get_Contribution_rate', array('as'=>'get_contribution_rate', 'uses'=>'Rate\ContributionRateController@Data'));
	
	// IPC Rate
	Route::resource('ipc_rate', 'Rate\IpcRateController');
	Route::get('get_ipc_rate', array('as'=>'get_ipc_rate', 'uses'=>'Rate\IpcRateController@Data'));
	
	// Base Wage
	Route::resource('base_wage', 'Wage\BaseWageController');
	Route::get('get_first_level_base_wage', array('as'=>'get_first_level_base_wage', 'uses'=>'Wage\BaseWageController@FirstLevelData'));
	Route::get('get_second_level_base_wage', array('as'=>'get_second_level_base_wage', 'uses'=>'Wage\BaseWageController@SecondLevelData'));
	Route::get('get_third_level_base_wage', array('as'=>'get_third_level_base_wage', 'uses'=>'Wage\BaseWageController@ThirdLevelData'));
	Route::get('get_fourth_level_base_wage', array('as'=>'get_fourth_level_base_wage', 'uses'=>'Wage\BaseWageController@FourthLevelData'));

	// Monthly Report
	Route::get('monthly_report', array('as'=>'monthly_report', 'uses'=>'Report\ReportController@ShowMonthlyReport'));
	Route::post('monthly_report', array('as'=>'monthly_report', 'uses'=> 'Report\ReportController@GenerateMonthlyReport'));

	// Record Affiliate
	Route::get('get_record/{affiliate_id}', array('as'=>'get_record', 'uses'=>'Affiliate\RecordController@Data'));

	// Affiliate
	Route::resource('affiliate', 'Affiliate\AffiliateController');
	Route::post('search_affiliate', array('as'=>'search_affiliate', 'uses'=>'Affiliate\AffiliateController@SearchAffiliate'));
	Route::get('get_affiliate', array('as'=>'get_affiliate', 'uses'=>'Affiliate\AffiliateController@Data'));

	// Spouses
	Route::resource('spouse', 'SpouseController');













	// Inicio
	Route::get('/', ['as' => 'home', 'uses' => 'HomeController@showIndex']);
	Route::get('home', ['as' => 'home', 'uses' => 'HomeController@showIndex']);

	// Solicitantes
	Route::resource('solicitante', 'SolicitanteController');

	// view Registros Aportes
	Route::resource('aporte', 'AporteController');

	Route::get('viewaporte/{afid}', 'AporteController@ViewAporte');
	// Select year Aporte
	Route::get('selectgestaporte/{afid}', 'AporteController@SelectGestAporte');
	// Cálculo aportes
	Route::get('calcaportegest/{afid}/{gesid}/{type}', 'AporteController@CalcAporteGest');
	Route::post('calcaportegest', 'AporteController@GenerateCalcAporteGest');

	Route::get('getRegPago/{id}', array('as'=>'getRegPago', 'uses'=>'AporteController@RegPagoData'));
	Route::get('getAporte/{afid}', array('as'=>'getAporte', 'uses'=>'AporteController@aportesData'));
	
	//Pagos Aporte
	Route::resource('aportepago', 'AportePagoController');
	Route::get('print_aportepago/{id}', 'AportePagoController@PrintAportePago');
	Route::get('getAportePago', array('as'=>'getAportePago', 'uses'=>'AportePagoController@AportePagoData'));


	// Tramite Fondo de Retiro
	Route::resource('tramite_fondo_retiro', 'FondoTramiteController');
	Route::get('tramite_fondo_retiro_ventanilla/{afid}', 'FondoTramiteController@print_ventanilla');
	Route::get('tramite_fondo_retiro_certificacion/{afid}', 'FondoTramiteController@print_certificacion');
	Route::get('tramite_fondo_retiro_calificacion/{afid}', 'FondoTramiteController@print_calificacion');
	Route::get('tramite_fondo_retiro_dictamenlegal/{afid}', 'FondoTramiteController@print_dictamenlegal');

});

define('ACCESS', 'alerick');