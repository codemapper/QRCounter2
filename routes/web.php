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

Route::get('/', 'GuestController@index')->name('home');
Route::get('/log/{code?}', 'GuestController@log')->name('log');

Route::get('/scan', 'ScanController@index')->name('scan');
Route::get('/code', 'ScanController@code')->name('scan.code');
Route::get('/scan/{station}', 'ScanController@points')->name('scan.station')->middleware('auth');
Route::get('/scan/{station}/{point}', 'ScanController@scan')->name('scan.points')->middleware('auth');
Route::get('/scan/{station}/{point}/store', 'ScanController@store')->name('scan.store')->middleware('auth');
Route::get('/dataprotect', 'DataProtectionController@index')->name('data.index')->middleware('auth');
Route::get('/dataprotect/fetch', 'DataProtectionController@fetch')->name('data.fetch')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('points', 'PointController')->middleware('auth');
Route::resource('stations', 'StationController')->middleware('auth');
Route::resource('codes', 'CodeController')->middleware('auth');
