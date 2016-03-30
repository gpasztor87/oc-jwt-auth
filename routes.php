<?php

Route::group(['prefix' => 'api/v1'], function() {

    Route::post('auth/login', ' Autumn\JWTAuth\Http\ControllersAuthController@authenticate');
    Route::post('auth/register', ' Autumn\JWTAuth\Http\ControllersAuthController@register');

});