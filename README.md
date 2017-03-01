#JWT-Auth plugin

[![Build Status](https://scrutinizer-ci.com/g/gpasztor87/oc-jwt-auth/badges/build.png?b=master)](https://scrutinizer-ci.com/g/gpasztor87/oc-jwt-auth/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gpasztor87/oc-jwt-auth/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gpasztor87/oc-jwt-auth/?branch=master)
[![StyleCI](https://styleci.io/repos/53659527/shield)](https://styleci.io/repos/53659527)

This plugin provides a simple means of authentication within OctoberCMS using JSON Web Tokens 
([spec](http://self-issued.info/docs/draft-ietf-oauth-json-web-token.html)).

It based on [JSON Web Token Authentication for Laravel & Lumen](https://github.com/tymondesigns/jwt-auth)
by Sean Tymon.

## Requirements

* [RainLab.User](https://github.com/rainlab/user-plugin) plugin

## Installation

* Extract this repository into plugins/autumn/jwtauth
* In plugins/autumn/jwtauth folder run `composer install`.
* Run `php artisan vendor:publish --provider="Autumn\JWTAuth\ServiceProvider"` command.
* Run `php artisan jwt:generate` command.

## Usage

This plugin provides the following api endpoints:

### /api/auth/login

Expects 2 parameters to receive: email and password. It authenticates the user via their
credentials, and returns a token corresponding to that user if succeeded.

### /api/auth/register

Expects 3 parameters to receive: username, email and password. It tries to create a user
and returns a token corresponding to that user if succeeded.

### /api/auth/logout

Provide the basic logout functionality.
