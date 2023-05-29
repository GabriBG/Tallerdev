<?php

use App\Http\Controllers\AsignaturaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;



Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => 'auth'], function () {
Route::resource('persona', 'App\Http\Controllers\PersonaController');
Route::resource('asignatura', 'App\Http\Controllers\AsignaturaController');
Route::resource('aula', 'App\Http\Controllers\AulaController');
Route::resource('horario', 'App\Http\Controllers\HorarioController');
Route::resource('grupo', 'App\Http\Controllers\GrupoController');
Route::resource('asignaciongrupo', 'App\Http\Controllers\AsignacionGrupoController');
Route::resource('docente', 'App\Http\Controllers\DocenteController');
Route::resource('clase', 'App\Http\Controllers\ClaseController');

});

Route::get('/home', [PersonaController::class, 'index'])->name('home');
Route::get('/dashboard', 'App\Http\Controllers\HomeController@index')->name('dashboard')->middleware('auth');
Route::get('/inicio', 'App\Http\Controllers\InicioController@index')->name('inicio')->middleware('auth');
Route::get('imprimirPersonas','App\http\Controllers\PdfController@imprimirPersonas')->name('imprimirPersonas');
Route::get('imprimirAsignaturas','App\http\Controllers\PdfController@imprimirAsignaturas')->name('imprimirAsignaturas');
Route::get('imprimirAsignacion','App\http\Controllers\PdfController@imprimirAsignacion')->name('imprimirAsignacion');
Route::get('/asignacion-grupo/{id}', 'App\http\Controllers\ClaseController@getAsignacionGrupo')->name('asignacion-grupo');
Route::get('/obtener-datos-asignacion-grupo', 'App\Http\Controllers\ClaseController@obtenerDatosAsignacionGrupo');
Route::get('/obtener-datos-horario', 'App\Http\Controllers\ClaseController@obtenerDatoshorario');
Route::get('/obtener-datos-aula', 'App\Http\Controllers\ClaseController@obtenerDatosaula');

Auth::routes();




Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

