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

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Key");

Route::get('/book/{id?}', 'BookController@get')->where('id', '[0-9]+');;

Route::get('/book/search/{name?}', 'BookController@search');

Route::get('/', function(){
	return 'welcome';
});

