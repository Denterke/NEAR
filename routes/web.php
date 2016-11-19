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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('admin_panel', [
    'middleware' => 'auth',
    'uses' => 'AppletsContentsController@index'
]);

Route::get('admin_panel/add_applet', [
    'middleware' => 'auth',
    'uses' => function () {
        return view('add_applet');
    }
]);

Route::get('admin_panel/edit_applet/{id}', [
    'middleware' => 'auth',
    'uses' => 'AppletsContentsController@show'
]);

Route::get('admin_panel/show_beacons', [
    'middleware' => 'auth',
    'uses' => 'AppletsContentsController@show_beacons'
]);

Route::get('admin_panel/set_applet/{beacon_token}&{applet_id}', [
    'middleware' => 'auth',
    'uses' => 'BeaconsController@set_applet'
]);

Route::get('admin_panel/unset_applet/{beacon_token}', [
    'middleware' => 'auth',
    'uses' => 'BeaconsController@unset_applet'
]);

Route::post('admin_panel/store_applet', [
    'middleware' => 'auth',
    'uses' => 'AppletsContentsController@store'
]);