<?php

use Illuminate\Http\Request;

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
// 设置请求有效时间，减少预请求次数：https://developer.mozilla.org/zh-CN/docs/Web/HTTP/Access_control_CORS
header("Access-Control-Max-Age: 86400");

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/book/{id?}', 'BookController@post')->where('id', '[0-9]+');;
