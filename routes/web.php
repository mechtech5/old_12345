<?php

Auth::routes();

Route::domain('compete.localhost')->group(function () {
	Route::get('/', 'Modules\Compete\DashboardController@index')->name('compete.dashboard.index');
	Route::resource('/rounds', 'Modules\Compete\RoundsController');
	Route::post('/rounds/join', 'Modules\Compete\RoundsController@join')->name('rounds.join');
	Route::resource('/round_details', 'Modules\Compete\RoundsDetailsController');
});

Route::get('/', 'WelcomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');

Route::group(['prefix' => 'admin', 'namespace' => 'Auth'], function() {
	Route::resource('/users', 'UsersController');
	Route::resource('/roles', 'RolesController');
	Route::resource('/permissions', 'PermissionsController');
});