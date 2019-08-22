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

/*Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/

Route::get('','FrontController@index');
Route::resource('reponse','ReponsesController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('administration', 'Auth\LoginController@showLoginForm')->name('administration');
Route::post('administration/', 'Auth\LoginController@login');
Route::get('administration/accueil', 'FrontController@index')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
