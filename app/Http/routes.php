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

Route::get('/', 'HomeController@showIndex');
Route::get('home', 'HomeController@showIndex');

// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

Route::group(['middleware' => 'auth'], function() {

	// Gestion de Usuarios
	Route::resource('usuario', 'UsuarioController');
	Route::get('usuario/block/{id}', 'UsuarioController@block');
	Route::get('usuario/unblock/{id}', 'UsuarioController@unBlock');
	Route::get('getUsuario', array('as'=>'getUsuario', 'uses'=>'UsuarioController@UsuariosData'));

	// Password reset link request routes...
	Route::get('password/email', 'Auth\PasswordController@getEmail');
	Route::post('password/email', 'Auth\PasswordController@postEmail');

	// Password reset routes...
	Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
	Route::post('password/reset', 'Auth\PasswordController@postReset');

	//search
	Route::get('buscar_afiliado', 'AfiliadoController@search');
	Route::get('ir_afiliado', 'AfiliadoController@go_search');

	// import
	Route::get('importar_archivo', 'ImportController@importSelect');
	Route::post('import', 'ImportController@import');

	// Afiliados
	Route::resource('afiliado', 'AfiliadoController');
	Route::get('afiliadoreporte/{id}', 'AfiliadoController@afiliadoReporte');
	Route::get('getAfiliado', array('as'=>'getAfiliado', 'uses'=>'AfiliadoController@afiliadosData'));

	//conyuge
	Route::resource('conyuge', 'ConyugeController');

	//view Registros Aportes
	// Route::resource('aportes', 'AporteController');

	Route::get('viewaporte/{afid}', 'AporteController@ViewAporte');

	Route::get('regaportegest/{afid}', 'AporteController@RegAporteGest');

	Route::get('calcaportegest/{afid}/{gesid}', 'AporteController@CalcAporteGest');

	Route::get('getRegPago/{id}', array('as'=>'getRegPago', 'uses'=>'AporteController@RegPagoData'));

	Route::get('getAporte/{afid}', array('as'=>'getAporte', 'uses'=>'AporteController@aportesData'));

	Route::get('getNote/{afid}', array('as'=>'getNote', 'uses'=>'NoteController@notesData'));

	// AporTasa
	Route::resource('tasa', 'TasaController');
	Route::get('getTasa', array('as'=>'getTasa', 'uses'=>'TasaController@tasasData'));

	// IPC
	Route::resource('ipc', 'IpcController');
	Route::get('getIpc', array('as'=>'getIpc', 'uses'=>'IpcController@ipctasasData'));

	// Sueldos
	Route::resource('sueldo', 'SueldoController');
	Route::get('getSueldoPri', array('as'=>'getSueldoPri', 'uses'=>'SueldoController@sueldoPriData'));
	Route::get('getSueldoSeg', array('as'=>'getSueldoSeg', 'uses'=>'SueldoController@sueldoSegData'));
	Route::get('getSueldoTer', array('as'=>'getSueldoTer', 'uses'=>'SueldoController@sueldoTerData'));
	Route::get('getSueldoCua', array('as'=>'getSueldoCua', 'uses'=>'SueldoController@sueldoCuaData'));

	//  Totales
	Route::get('totales', 'ReporteController@ReportAporte');
	Route::post('ir_totales', 'ReporteController@GenerateReportAporte');
	
	Route::get('total_month', 'ReporteController@ReportAporteMonth');
	Route::post('go_total_month', 'ReporteController@GenerateReportAporteMonth');
	
});

// //Permisos
// Route::get('afiliadoo/{id}', function ($id){

// 	$afil = Muserpol\Afiliado::findOrFail($id);
// 		// allows
// 	if (Gate::denies('view-afiliado', $afil)){
		
// 		return $afil;
// 	}

// 	return $afil->ci;
// });


