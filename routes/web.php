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

Route::get('/', 'DistrictController@index');

//Route::get('datos', 'DistrictController@insert_Data');
Route::get('reporte', 'DistrictController@get_Report');
//Route::get('update','DistrictController@update_Data');

//Route::get('updateWhole','DistrictController@update_wholeData');
