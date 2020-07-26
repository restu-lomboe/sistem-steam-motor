<?php

Route::get('karyawan','KarwayanController@index');
Route::post('karyawan','KarwayanController@store');
Route::get('karyawan/{id}','KarwayanController@show');
Route::put('karyawan/{id}','KarwayanController@update');
Route::delete('karyawan/{id}','KarwayanController@destroy');
