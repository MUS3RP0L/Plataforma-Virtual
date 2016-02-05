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

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);

// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


Route::resource('afiliado', 'AfiliadoController');



//Permisos
Route::get('afiliadoo/{id}', function ($id){

	Auth::loginUsingId(1);

	$afil = App\Afiliado::findOrFail($id);
		// allows
	if (Gate::denies('view-afiliado', $afil)){
		
		// abort(403);
		// return view('welcome'); 
		return $afil;
	}

	return $afil->ci;
});



//busqueda

Route::get('busca_afiliado', function () {
   return view('afiliados.search');
});






Route::get('searchafi', function(){
     
    if (empty(Input::get('search'))) return redirect()->back();
    
    $search = urlencode(e(Input::get('search')));
    $route = "home/search/$search";
    return redirect($route);
});
Route::get("home/search/{search}", "AfiliadoController@search");




Route::get('importar_archivo', 'ImportController@importSelect');
Route::post('import', 'ImportController@import');


