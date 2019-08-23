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
*/
Route::get('/home', 'HomeController@index')->name('home');


Route::get('','FrontController@index');
Route::resource('reponse','ReponsesController');
Auth::routes();
Route::get('/{id}', 'FrontController@userReponse')->where('id', '[0-9a-fA-F]{8}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{12}');

Route::get('administration', 'Auth\LoginController@showLoginForm')->name('administration');
Route::post('administration/', 'Auth\LoginController@login');
Route::get('administration/accueil', 'AdminController@index')->middleware('auth');
Route::get('administration/questionnaire', 'AdminController@questionnaire')->middleware('auth');
Route::get('administration/reponses', 'AdminController@reponses')->middleware('auth');
Auth::routes();


