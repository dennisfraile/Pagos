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
    return view('home');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::group(['middleware'=>['web']], function ()
{
	
    route::resource('formPagos','pagosController');
    route::resource('agua','aguaController');
    route::resource('luz','luzController');
    route::resource('telefono','telefonoController');
    route::resource('inter','interController');
    route::resource('info','infoController');


   
    
});
