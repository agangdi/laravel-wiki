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
    Route::group(['prefix' => '/book'], function(){

        Route::post('/{id?}', 'BookController@post')->where('id', '[0-9]+');;
        Route::options('/{id?}', 'BookController@post');

    });

    Route::post('/login', 'User\LoginController');

});
