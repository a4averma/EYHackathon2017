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




Route::post('/search', ['as' => 'search', 'uses'=> 'LawController@search']);
Route::get('/document/{id}', ['as' => 'document', 'uses'=> 'LawController@document']);
Route::get('/refresh', 'LawController@refresh');
Route::get('/', 'LawController@index');



