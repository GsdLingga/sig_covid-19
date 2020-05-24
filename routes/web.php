<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('content.dashboard');
// });

Route::get('/', 'DashboardController@index')->name('dashboard');

Route::get('/datakabupaten', 'DataKabupatenController@index')->name('datakabupaten');
Route::get('/datakabupaten/fetch_data', 'DataKabupatenController@fetch_data');

Route::get('/datakabupaten/{id}/edit', 'DataKabupatenController@edit');

Route::put('/datakabupaten/{id}', 'DataKabupatenController@update');

Route::get('/getDataMap','DashboardController@getDataMap');
Route::get('/getDataColorMap','DashboardController@getDataColorMap');

Route::get('/copyData','DataKabupatenController@store');
