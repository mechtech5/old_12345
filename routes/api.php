<?php

Route::post('/login', 'Auth\CustomAuthController@login');
Route::post('/register', 'Auth\CustomAuthController@register');

Route::group(['middleware' => 'auth:api'], function()	{
    Route::get('/me', 'Auth\CustomAuthController@me');
});

