<?php

// use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');

});

Route::middleware(['auth', 'admin'])->group(function(){
    //route admin
    Route::get('karyawan','KarwayanController@index');
    Route::post('karyawan','KarwayanController@store');
    Route::get('karyawan/{id}','KarwayanController@show');
    Route::put('karyawan/{id}','KarwayanController@update');
    Route::delete('karyawan/{id}','KarwayanController@destroy');
});

Route::middleware(['auth', 'karyawan'])->group(function(){
    //route admin dan karyawan
    Route::get('karyawan','KarwayanController@index');
    Route::post('karyawan','KarwayanController@store');
    Route::get('karyawan/{id}','KarwayanController@show');
    Route::put('karyawan/{id}','KarwayanController@update');
    Route::delete('karyawan/{id}','KarwayanController@destroy');
});

