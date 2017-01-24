<?php

namespace Autumn\JWTAuth;

use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Middleware\RefreshToken;
use Tymon\JWTAuth\Middleware\GetUserFromToken;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerMiddleware('jwt.auth', GetUserFromToken::class);
        $this->registerMiddleware('jwt.refresh', RefreshToken::class);
    }

    public function boot()
    {
        $this->publishes([
            realpath(__DIR__.'/config/jwt.php') => config_path('jwt.php'),
            realpath(__DIR__.'/config/api.php') => config_path('api.php')
        ]);
    }

    /**
     * Helper method to quickly setup middleware.
     *
     * @param string $alias
     * @param string $class
     */
    protected function registerMiddleware($alias, $class)
    {
        $this->app['router']->middleware($alias, $class);
    }
}
