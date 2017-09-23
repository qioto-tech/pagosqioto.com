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


	Route::resource('payment', 'PaymentController',['only' => ['index', 'store', 'update', 'destroy', 'show']]);
	Route::resource('register', 'RegisterController',['only' => ['index', 'store', 'update', 'destroy', 'show']]);