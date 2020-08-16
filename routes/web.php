<?php

use Illuminate\Support\Facades\Route;

Route::get('/series', "SeriesController@index")
    ->name('listar_series');
Route::get('/series/criar', "SeriesController@create")
    ->name('criar_serie')
    ->middleware('autenticador');
Route::get('/series/{serie}/temporadas', "TemporadasController@index")
    ->name('listar_temporadas');
Route::get('/temporadas/{temporada}/episodios', "EpisodiosController@index");
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/entrar', 'EntrarController@index');
Route::get('/registrar', 'RegistroController@create');
Route::get('/sair', function () {
    Illuminate\Support\Facades\Auth::logout();
    return redirect('/entrar');
});

Route::post('/series/criar', "SeriesController@store");
Route::post('/series/{serieId}/editaNome', "SeriesController@editaNome")
    ->middleware('autenticador');
Route::post('/temporadas/{temporada}/episodios/assistir', "EpisodiosController@assistir")
    ->middleware('autenticador');
Route::post('/entrar', 'EntrarController@entrar');
Route::post('/registrar', 'RegistroController@store');

Route::delete('/series/{id}', "SeriesController@destroy")
    ->middleware('autenticador');

Auth::routes();
