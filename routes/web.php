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

Route::get('/', function (){
    return view('index');
});

Route::get('login', 'AuthController@login')->name('login');
Route::get('logout', 'AuthController@logout')->name('logout');
Route::post('login', 'AuthController@postLogin')->name('auth.login');

Route::get('/home', 'HomeController@home')->name('home');



//Route::group(['middleware' => 'auth'], function () {
//    Route::get('/home', function () {
//        return view('welcome');
//    })->name('home');
//});