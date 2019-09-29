<?php

Auth::routes();

Route::get('/', 'MainController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Auth'], function() {
	Route::resource('/users', 'UsersController');
	Route::resource('/roles', 'RolesController');
	Route::resource('/permissions', 'PermissionsController');
});

Route::group(['namespace' => 'WEB\Base'], function() {
	Route::get('/profile', 'ProfileController@index');
	Route::get('/profile/setup', 'ProfileController@setup');
	Route::get('/wallet', 'WalletController@index');
});

Route::group(['prefix' => 'dev', 'namespace' => 'Dev'], function() {
	
});

Route::group(['prefix' => 'jobs', 'namespace' => 'Job'], function() {
	
});

Route::group(['prefix' => 'social', 'namespace' => 'Social'], function() {
	
});
