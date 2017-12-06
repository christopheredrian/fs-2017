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

Route::get('/', 'HomeController@index');
Route::get('about', 'HomeController@about');
Route::get('home', 'HomeController@index')->name('home');
Route::resource('accounts', 'AccountController');
Route::resource('journals', 'JournalController', [
    'only' => ['index', 'create', 'store']
]);
Route::get('ledgers', 'LedgerController@index');
Route::get('income', 'ReportController@income');
Route::get('balance', 'ReportController@balance');

Auth::routes();
