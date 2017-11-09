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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/realestate', 'RealestateController@index')->name('realestate_index');
Route::post('/realestate', 'RealestateController@store')->name('realestate_store');
Route::delete('/realestate/{id}/destroy', 'RealestateController@destroy')->name('realestate_destroy');
Route::get('/realestate/create', 'RealestateController@create')->name('realestate_create');
Route::get('/realestate/{id}/edit', 'RealestateController@edit')->name('realestate_edit');
//Route::update('/realestate/{id}/update', 'RealestateController@update')->name('realestate_update');
