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

Auth::routes(['register=> false']);

Route::get('/', 'DashboardController@index')->name('Dashboard');

Route::resource('pertanyaan', 'PertanyaanController');

// Pertanyaan
Route::get('/home', 'PertanyaanController@index')->name('index');
Route::get('/create', 'PertanyaanController@create');
Route::post('/store', 'PertanyaanController@store');
Route::get('/show/{id}', 'PertanyaanController@show')->name('detail');
Route::get('/edit/{id}', 'PertanyaanController@edit');
Route::put('/update/{id}', 'PertanyaanController@update');
Route::get('/delete/{id}', 'PertanyaanController@destroy');
Route::put('/pertanyaan/upvote/{id}', 'PertanyaanController@upvote');
Route::put('/pertanyaan/downvote/{id}', 'PertanyaanController@downvote');