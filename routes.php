<?php

Route::group(['prefix' => 'api/v1'], function() {

    Route::post('auth/login', 'Autumn\JWTAuth\Http\Controllers\AuthController@authenticate');
    Route::post('auth/register', 'Autumn\JWTAuth\Http\Controllers\AuthController@register');

});