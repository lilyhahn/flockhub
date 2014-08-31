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
Route::get('/', 'AuthController@login');

Route::get('/dashboard', 'DashboardController@index');
Route::get('/handle/login', 'AuthController@handleLogin');
Route::get('callback', 'AuthController@callback');