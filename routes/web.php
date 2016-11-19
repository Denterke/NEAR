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