<?php

Auth::routes();

Route::domain('compete.localhost')->namespace('Modules\Compete')->group(function () {
	Route::get('/', 'DashboardController@index')->name('compete.dashboard.index');
	Route::get('/home', 'DashboardController@home')->name('compete.dashboard.home');
	Route::resource('/rounds', 'RoundsController');
	Route::post('/rounds/join', 'RoundsController@join')->name('rounds.join');
	Route::resource('/round_details', 'RoundDetailsController');
});

Route::domain('ayushiblogs.localhost')->name('ayushiblogs.')->namespace('Modules\Ayushiblogs')->group(function () {
	Route::get('/', 'MainController@index')->name('welcome');
	Route::get('/home', 'MainController@home')->name('home');

	Route::get('/article/{article_id}/{slug}', 'ArticlesController@view')
		->name('ayushiblogs.article.view');

	Route::resource('/articles', 'ArticlesController');
	Route::resource('/comments', 'ArticlesController');
});

Route::get('/', 'WelcomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');

Route::resource('/articles', 'ArticlesController');
Route::resource('/comments', 'CommentsController');
Route::resource('/tags', 'TagsController');

Route::group(['prefix' => 'admin', 'namespace' => 'Auth'], function() {
	Route::resource('/users', 'UsersController');
	Route::resource('/roles', 'RolesController');
	Route::resource('/permissions', 'PermissionsController');
});