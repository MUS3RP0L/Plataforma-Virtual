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

	// Inicio
	Route::get('/', ['as' => 'home', 'uses' => 'HomeController@showIndex']);
	Route::get('home', ['as' => 'home', 'uses' => 'HomeController@showIndex']);

	// Afiliados
	Route::resource('afiliado', 'AfiliadoController');
	Route::get('ir_afiliado', 'AfiliadoController@go_search');
	Route::get('getAfiliado', array('as'=>'getAfiliado', 'uses'=>'AfiliadoController@afiliadosData'));

	// Conyuges
	Route::resource('conyuge', 'ConyugeController');

	// Solicitantes
	Route::resource('solicitante', 'SolicitanteController');

	// view Registros Aportes
	Route::resource('aporte', 'AporteController');
	Route::get('viewaporte/{afid}', 'AporteController@ViewAporte');
	Route::get('selectgestaporte/{afid}', 'AporteController@SelectGestAporte');
	Route::get('calcaportegest/{afid}/{gesid}', 'AporteController@CalcAporteGest');
	Route::get('getRegPago/{id}', array('as'=>'getRegPago', 'uses'=>'AporteController@RegPagoData'));
	Route::get('getAporte/{afid}', array('as'=>'getAporte', 'uses'=>'AporteController@aportesData'));
	
	// Notas
	Route::get('getNote/{afid}', array('as'=>'getNote', 'uses'=>'NoteController@notesData'));

	// Totales
	Route::get('totales', 'ReporteController@ReportAporte');
	Route::post('ir_totales', 'ReporteController@GenerateReportAporte');
	Route::get('total_month', 'ReporteController@ReportAporteMonth');
	Route::post('go_total_month', 'ReporteController@GenerateReportAporteMonth');

	// Tramite Fondo de Retiro
	Route::resource('tramite_fondo_retiro', 'FondoTramiteController');
	Route::get('tramite_fondo_retiro_ventanilla/{afid}', 'FondoTramiteController@print_ventanilla');
	Route::get('tramite_fondo_retiro_certificacion/{afid}', 'FondoTramiteController@print_certificacion');
	Route::get('tramite_fondo_retiro_calificacion/{afid}', 'FondoTramiteController@print_calificacion');
	Route::get('tramite_fondo_retiro_dictamenlegal/{afid}', 'FondoTramiteController@print_dictamenlegal');




	// Gestion de Usuarios
	Route::resource('usuario', 'UsuarioController');
	Route::get('usuario/block/{id}', 'UsuarioController@block');
	Route::get('usuario/unblock/{id}', 'UsuarioController@unBlock');
	Route::get('getUsuario', array('as'=>'getUsuario', 'uses'=>'UsuarioController@UsuariosData'));
	
	// AporTasa
	Route::resource('tasa', 'TasaController');
	Route::get('getTasa', array('as'=>'getTasa', 'uses'=>'TasaController@tasasData'));

	// IPCTasa
	Route::resource('ipc', 'IpcController');
	Route::get('getIpc', array('as'=>'getIpc', 'uses'=>'IpcController@ipctasasData'));

	// Sueldos
	Route::resource('sueldo', 'SueldoController');
	Route::get('getSueldoPri', array('as'=>'getSueldoPri', 'uses'=>'SueldoController@sueldoPriData'));
	Route::get('getSueldoSeg', array('as'=>'getSueldoSeg', 'uses'=>'SueldoController@sueldoSegData'));
	Route::get('getSueldoTer', array('as'=>'getSueldoTer', 'uses'=>'SueldoController@sueldoTerData'));
	Route::get('getSueldoCua', array('as'=>'getSueldoCua', 'uses'=>'SueldoController@sueldoCuaData'));

});

define('ACCESS', 'alerick');