<?php

namespace Autumn\JWTAuth;

use App;
use Illuminate\Foundation\AliasLoader;
use System\Classes\PluginBase;

/**
 * JWTAuth Plugin Information File.
 */
class Plugin extends PluginBase
{
    /**
     * @var array Plugin dependencies
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
        $alias = AliasLoader::getInstance();
        $alias->alias('JWTAuth', 'Tymon\JWTAuth\Facades\JWTAuth');

        App::register('Tymon\JWTAuth\Providers\JWTAuthServiceProvider');
        App::register('Autumn\JWTAuth\Providers\JWTServiceProvider');
    }
}
