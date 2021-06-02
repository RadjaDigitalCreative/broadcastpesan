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

Auth::routes();
Route::group(['middleware' => 'auth','verified'], function () {
	Route::get('/', 'Admin\DashboardController@index')->name('dashboard');
	Route::get('/home', 'Admin\DashboardController@index')->name('dashboard');
	Route::get('/bayar', 'Admin\DashboardController@bayar')->name('bayar');
	Route::get('/waweb', 'Admin\WawebController@index')->name('waweb');
	Route::post('/waweb/import', 'Admin\WawebController@import')->name('wa.import');
	Route::post('/waweb/status', 'Admin\WawebController@status')->name('wa.status');
	Route::get('/delete/waweb', 'Admin\WawebController@delete')->name('wa.delete');
	Route::delete('/waweb/destroy/{id}', 'Admin\WawebController@destroy')->name('waweb.destroy');

	Route::get('/database', 'Admin\DatabaseController@index')->name('database');

	Route::get('/profile', 'Admin\ProfileController@index')->name('profile');
	Route::post('/profile/store', 'Admin\ProfileController@store')->name('profile.store');
	Route::post('/profile/store2', 'Admin\ProfileController@store2')->name('profile.store2');

	Route::get('/user', 'Admin\UserController@index')->name('user');
	Route::post('/user/filter', 'Admin\UserController@index_filter')->name('user.filter');
	Route::get('/user/payment', 'Admin\UserController@payment')->name('user.payment');
	Route::post('/user/payment/store', 'Admin\UserController@payment_store')->name('user.payment.store');
	Route::delete('/user/delete/{id}', 'Admin\UserController@payment_delete')->name('user.payment.delete');

	Route::delete('/user/destroy/{id}', 'Admin\UserController@destroy')->name('user.delete');
	Route::post('/user/payment/bayar', 'Admin\UserController@payment_bayar')->name('user.payment.bayar');
	Route::post('/user/payment/bayar2', 'Admin\UserController@payment_bayar2')->name('user.payment.bayar2');
	Route::post('/user/payment/konfirmasi', 'Admin\UserController@payment_konfirmasi')->name('user.payment.konfirmasi');

	Route::get('/notification', 'Admin\NotificationController@index')->name('notification');
	Route::get('/notification/konfirmasi', 'Admin\NotificationController@konfirmasi')->name('notification.konfirmasi');

});
