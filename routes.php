<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->post('auth/login', 'Autumn\JWTAuth\Http\Controllers\AuthController@authenticate');
    $api->post('auth/register', 'Autumn\JWTAuth\Http\Controllers\AuthController@register');
});
