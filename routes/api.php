<?php

use Illuminate\Http\Request;
use App\Http\Middleware\CheckCORS;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'cors'], function () {

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Origin, x-email, x-token, Content-Type, Accept, Key");
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE");

    Route::group(['middleware' => 'wauth'], function() {

        Route::group(['prefix' => '/book'], function(){

            Route::post('/{id?}', 'BookController@post')->where('id', '[0-9]+');;
            Route::get('/{id}', 'BookController@detail');
            Route::get('', 'BookController@get');
	        Route::delete('/{id?}', 'BookController@del')->where('id', '[0-9]+');;

	        Route::post('/chapter', 'Book\ChapterController@post');
	        Route::get('/{book_id}/chapter', 'Book\ChapterController@index')
		        ->where('book_id', '[0-9]+');
	        Route::get('/chapter/{id}', 'Book\ChapterController@detail')->where('id', '[0-9]+');

        });

        Route::post('/reg', 'User\RegController');

        Route::get('/user', 'User\IndexController');
    });


    Route::post('/login', 'User\LoginController');

});
