<?php

use Illuminate\Http\Request;

Route::post('/reset/password', 'Api\Forgot@forgot')->name('api.login');
Route::post('/login', 'Api\LoginApi@login')->name('login');
Route::post('/register', 'Api\LoginApi@register')->name('login');

Route::get('/profile', 'Api\ProfileApi@index')->name('profile');
Route::get('/profile/{id}', 'Api\ProfileApi@get')->name('profile');
Route::post('/profile/update', 'Api\ProfileApi@update')->name('profile');
Route::post('/profile/image', 'Api\ProfileApi@image')->name('profile');

Route::get('/daftar_harga', 'Api\UserApi@daftar_harga')->name('index');
Route::post('/user', 'Api\UserApi@index')->name('index');
Route::post('/user/bayar', 'Api\UserApi@bayar')->name('index');
Route::post('/user/bayar/konfirmasi', 'Api\UserApi@bayar_konfirmasi')->name('index');
Route::post('/notif', 'Api\UserApi@notif')->name('index');
Route::post('/notif/user', 'Api\UserApi@notif_user')->name('index');
Route::post('/status/user', 'Api\UserApi@user_status')->name('index');
Route::post('/notif/user/belum_bayar', 'Api\UserApi@notif_user_belum_bayar')->name('index');
Route::post('/notif/hapus', 'Api\UserApi@hapus')->name('index');

Route::get('/format', 'Api\WaApi@format')->name('format');
Route::post('/waweb/index', 'Api\WaApi@index')->name('waweb');
Route::post('/waweb/kirim', 'Api\WaApi@kirim')->name('waweb');
Route::post('/waweb/create', 'Api\WaApi@create')->name('waweb');
Route::post('/waweb/delete', 'Api\WaApi@destroy')->name('waweb');
Route::post('/waweb/import', 'Api\WaApi@import')->name('waweb');
Route::post('/waweb', 'Api\WaApi@destroy')->name('waweb');
Route::post('/waweb/deleteAll', 'Api\WaApi@destroyAll')->name('waweb');

