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

Route::get('/', function () {
    return view('welcome');
});

Route::get('list', 'CustomerController@index')->name('list');

Route::get('searchAllData', 'CustomerController@searchAll')->name('searchAll');

Route::get('customSearching', 'CustomerController@customSearch')->name('customSearch');

// DAO
Route::get('designPattern', 'DesignController@index');
