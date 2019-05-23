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
    return view('masters.index');
});

Route::get('daftar_lowongan', 'MasterController@listLowongan');

Route::get('detail_lowongan/{id}', 'MasterController@detailLowongan')->name('detail_lowongan');

Auth::routes();

//handling Home Controller
Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['auth','role:Admin']], function(){

    Route::get('daftar_user', 'AdminController@listUser')->name('daftar_user');

    Route::get('admin', 'AdminController@index')->name('admin');
    
    Route::resource('lowongan', 'LowonganController', ['except' => ['show']]);

    Route::resource('posisi', 'PosisiController');
});

Route::group(['middleware' => ['auth','role:User']], function(){
    //handling User Detail
    Route::resource('user_detail', 'UserDetailController');
});

Route::resource('lowongan_user', 'LowonganUserController');

