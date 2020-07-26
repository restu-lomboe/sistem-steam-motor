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

Route::get('/home', 'HomeController@index')->name('home');

//login socialite
Route::get('/redirect/{provider}', 'Frontend\UserController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'Frontend\UserController@handleProviderCallback');

Route::middleware(['auth', 'admin'])->group(function(){
    //route admin
});

Route::middleware(['auth', 'karyawan'])->group(function(){
    //route admin dan karyawan
});
