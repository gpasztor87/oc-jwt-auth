<?php

namespace Autumn\JWTAuth;

use System\Classes\PluginBase;

/**
 * JWTAuth Plugin Information File.
 */
class Plugin extends PluginBase
{
    /**
     * Determine if this plugin should have elevated privileges.
     *
     * @var bool
     */
    public $elevated = true;

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
            'name' => 'JWTAuth',
            'description' => 'JSON Web Token Authentication.',
            'author' => 'Autumn',
            'icon' => 'icon-user-secret',
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\Dingo\Api\Provider\LaravelServiceProvider::class);
        $this->app->register(\Tymon\JWTAuth\Providers\JWTAuthServiceProvider::class);

        $this->app->register(ServiceProvider::class);
    }
}
