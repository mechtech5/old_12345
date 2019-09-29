<?php

use Illuminate\Http\Request;

Route::post('login', 'API\AuthController@login');
Route::post('register', 'API\AuthController@register');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'social', 'namespace' => 'API', 'middleware' => 'auth:api'] , function () {
	Route::apiResource('posts', 'PostsController');
});


