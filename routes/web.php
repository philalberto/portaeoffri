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

//Route::get('/', function () {
//    $laravel = app();
//    $version = $laravel::VERSION;
//    return $version;
//});
Route::get('/', 'Main@menu');
//Route::get('home', 'Main@home');
Route::get('contact', 'Main@contact');
Route::get('creaEvento', 'Main@creaEvento');
Route::get('visualizzaFormEvento', 'Main@visualizzaFormEvento');
Route::get('get/{token}', 'Main@getArticoliEvento'); //17/11/2015

Route::get('insCodiceEvento', 'Main@insCodiceEvento');


Route::get('getSize/{width}/{height}', 'Main@getSize');
Route::get('main', 'Main@main');
Route::get('articoli', 'Main@mostraArticoli');
Route::post('salvaArticoli', 'Main@salvaArticoli');
Route::post('salvaEvento', 'Main@salvaEvento');



//Route::get('ajax', function(){ return view('pages.ajax'); });
//Route::post('/postajax','Main@postajax');

Route::get('ajaxRequest', 'Main@ajaxRequest');
Route::post('ajaxRequest', 'Main@ajaxRequestPost');
Route::post('ajaxRequest2', 'Main@ajaxRequestPost2');

Route::get('test', 'Main@test');
