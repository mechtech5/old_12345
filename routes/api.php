<?php

Route::group(['prefix' => 'v1', 'namespace' => 'Api'], function(){
 	Route::post('login', 'AuthController@login');
 	Route::post('register', 'AuthController@register');
 	Route::group(['middleware' => 'auth:api'], function()	{
 		Route::post('me', 'AuthController@me');

 	});
});



