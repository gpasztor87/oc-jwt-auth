<?php

Route::group(['prefix' => 'api'], function () {
    Route::post('auth/login', 'Autumn\JWTAuth\Http\Controllers\AuthController@authenticate');
    Route::post('auth/register', 'Autumn\JWTAuth\Http\Controllers\AuthController@register');
    Route::post('auth/logout', 'Autumn\JWTAuth\Http\Controllers\AuthController@logout');

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('auth/me', 'Autumn\JWTAuth\Http\Controllers\AuthController@user');
    });
});
