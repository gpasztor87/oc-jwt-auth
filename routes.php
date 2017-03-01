<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->post('auth/login', 'Autumn\JWTAuth\Http\Controllers\AuthController@authenticate');
    $api->post('auth/register', 'Autumn\JWTAuth\Http\Controllers\AuthController@register');
    $api->post('auth/logout', 'Autumn\JWTAuth\Http\Controllers\AuthController@logout');

    $api->group(['middleware' => 'jwt.auth'], function ($api) {
        $api->get('auth/me', 'Autumn\JWTAuth\Http\Controllers\AuthController@user');
    });
});
