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

Route::get('/', 'indexController@index');

Route::get('/sign','SignController@index');

Route::post('/checkname','SignController@checkname');
Route::post('/checkmail','SignController@checkmail');
Route::post('/checkpassword','SignController@checkpassword');
Route::post('/loginemail','SignController@checkloginemail');


Route::post('/sign','SignController@store');
Route::post('/signin','SignController@login');

Route::get('/publish','indexController@publish');
Route::post('/publish','indexController@store');

Route::get('/comment','indexController@comment');