<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Auth'], function() {
	Route::resource('/users', 'UsersController');
	Route::resource('/roles', 'RolesController');
	Route::resource('/permissions', 'PermissionsController');
});
