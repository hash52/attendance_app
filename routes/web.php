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

Route::group(['middleware'=>'auth'], function () {
    Route::get('/', 'AttendanceController@add')->name('top');
    Route::post('/attend', 'AttendanceController@attend')->name('attend');
    Route::post('/leave', 'AttendanceController@leave')->name('leave');
});

Route::group(['prefix'=>'admin'], function () {
    Route::get('/', 'Admin\UserController@index')->name('admin.top');
});

Auth::routes();
