<?php

Auth::routes();

// Route::domain('compete.jigsawme.test')->namespace('Compete')->group(function () {
// 	Route::get('/', 'DashboardController@index')->name('compete.dashboard.index');
// 	Route::get('/home', 'DashboardController@home')->name('compete.dashboard.home');
// 	Route::resource('/rounds', 'RoundsController');
// 	Route::post('/rounds/join', 'RoundsController@join')->name('rounds.join');
// 	Route::resource('/round_details', 'RoundDetailsController');
// });

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback','Auth\LoginController@handleProviderCallback');

Route::domain('ayushiblogs.jigsawme.test')->name('ayushiblogs.')->namespace('Ayushiblogs')->group(function () {
	Route::get('/', 'BlogController@index')->name('index');
	Route::get('/home', 'BlogController@home')->name('home');
	Route::get('/post/{slug}', 'BlogController@show')->name('show');
	Route::get('/post/{tag}', 'BlogController@tag')->name('tag');
	Route::get('/contact', 'BlogController@contact')->name('contact');
	Route::get('/about', 'BlogController@about')->name('about');
	Route::get('/network', 'BlogController@network')->name('network');

	// Actions
	Route::get('/get-view-count', 'BlogController@getViewCount');
});

Route::get('/', 'WelcomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');

// Route::resource('/article', 'ArticlesController');
// Route::resource('/comment', 'CommentsController');
// Route::resource('/tag', 'TagsController');

Route::group(['prefix' => 'social', 'namespace' => 'Social'], function() {
	Route::post('/add', 'SocialController@add')->name('social.add');
	Route::post('/accept', 'SocialController@accept')->name('social.accept');
	Route::post('/decline', 'SocialController@decline')->name('social.decline');
});


Route::group(['prefix' => 'admin', 'namespace' => 'Auth'], function() {
	Route::resource('/users', 'UsersController');
	Route::resource('/roles', 'RolesController');
	Route::resource('/permissions', 'PermissionsController');
});