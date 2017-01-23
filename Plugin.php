<?php

namespace Autumn\JWTAuth;

use Illuminate\Foundation\AliasLoader;
use System\Classes\PluginBase;

/**
 * JWTAuth Plugin Information File.
 */
class Plugin extends PluginBase
{
    /**
     * Plugin dependencies.
     *
     * @var array
     */
    public $require = ['RainLab.User'];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'JWTAuth',
            'description' => 'JSON Web Token Authentication.',
            'author'      => 'Autumn',
            'icon'        => 'icon-user-secret',
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {
        $this->app['config']['jwt'] = require __DIR__.'/config/jwt.php';
        $this->app['config']['api'] = require __DIR__.'/config/api.php';

        $this->app->register(\Dingo\Api\Provider\LaravelServiceProvider::class);
        $this->app->register(\Tymon\JWTAuth\Providers\JWTAuthServiceProvider::class);

        $alias = AliasLoader::getInstance();
        $alias->alias('JWTAuth', \Tymon\JWTAuth\Facades\JWTAuth::class);
        $alias->alias('JWTFactory', \Tymon\JWTAuth\Facades\JWTFactory::class);
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        $this->app->register(\Autumn\JWTAuth\Providers\JWTServiceProvider::class);

        $this->app['Dingo\Api\Auth\Auth']->extend('jwt', function ($app) {
            return new \Dingo\Api\Auth\Provider\JWT($app['Tymon\JWTAuth\JWTAuth']);
        });
    }
}
