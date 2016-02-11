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

// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

Route::group(['middleware' => 'auth'], function() {

	// Registration routes...
	Route::get('register', 'Auth\AuthController@getRegister');
	Route::post('register', 'Auth\AuthController@postRegister');

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

	Route::resource('afiliado', 'AfiliadoController');
	Route::get('getAfiliado', array('as'=>'getAfiliado', 'uses'=>'AfiliadoController@anyData'));

	Route::get('totalganado/{id?}', 'TotalController@totalGanado');

});

//Permisos
Route::get('afiliadoo/{id}', function ($id){

	$afil = App\Afiliado::findOrFail($id);
		// allows
	if (Gate::denies('view-afiliado', $afil)){
		
		return $afil;
	}

	return $afil->ci;
});


