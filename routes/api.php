<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function() {
	 	Route::post('login', 'Auth\ApiController@login');
	 	Route::post('register', 'Auth\ApiController@register');
	 	Route::group(['middleware' => 'auth:api'], function()	{
	 		Route::post('user', 'Auth\ApiController@user');
 	});
});


