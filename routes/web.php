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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/series', 'SeriesController@listar')->name('series_listar');
Route::get('/series/criar', 'SeriesController@create');
Route::post('/series/criar', 'SeriesController@store')->name('series_criar');
Route::post('/series/remover/{id}', 'SeriesController@remove');
Route::post('/series/{id}/editaNome', 'SeriesController@editaNome');

Route::get('/series/{SerieId}/temporadas', 'TemporadasController@index');
Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');
Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
