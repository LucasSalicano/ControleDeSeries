<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/series', 'SeriesController@listar')->name('series_listar');
Route::get('/series/criar', 'SeriesController@create')
    ->middleware('autenticador');
Route::post('/series/criar', 'SeriesController@store')->name('series_criar')
    ->middleware('autenticador');
Route::post('/series/remover/{id}', 'SeriesController@remove')
    ->middleware('autenticador');
Route::post('/series/{id}/editaNome', 'SeriesController@editaNome')
    ->middleware('autenticador');
Route::get('/series/{SerieId}/temporadas', 'TemporadasController@index');
Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');
Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir')
    ->middleware('autenticador');;

Route::get('/registrar', 'RegistroController@create');
Route::post('/registrar', 'RegistroController@store');

Route::get('/entrar', 'EntrarController@index');
Route::post('/entrar', 'EntrarController@entrar');
Route::get('/sair', function () {
    Auth::logout();
    return redirect('/entrar');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
