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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::get('beacon/{token}&{IMEI}', 'BeaconsController@show');

Route::resource('applet', 'AppletsContentsController');

Route::resource('comment', 'CommentController');

Route::get('like/{IMEI}&{applet_id}', 'LikesController@like');

Route::get('un_like/{IMEI}&{applet_id}', 'LikesController@un_like');