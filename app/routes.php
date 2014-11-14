<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', array('uses'=>'HomeController@getIndex'));
Route::get('search', array('uses'=>'HomeController@getSearch'));
Route::get('trials', array('uses'=>'HomeController@getTrials'));
