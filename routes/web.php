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


Route::get('/', 							'HomeController@index');

Route::get('/prijsvraag/', 					'FormController@index');
Route::post('/prijsvraag/submit', 			'FormController@submit');

Route::get('/dashboard', 					'DashboardController@getResponses');
Route::get('/dashboard/{id}', 				'DashboardController@getSavedResponses');
Route::post('/dashboard/delete', 			'DashboardController@delete');
//Route::post('/dashboard/confirm-delete',	'DashboardController@confirmDelete');

Route::get('/config', 						'ConfigController@index');
Route::post('/config/submit', 				'ConfigController@submit');

Auth::routes(['register' => false]);