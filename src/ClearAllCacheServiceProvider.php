<?php

namespace I9w3b\ClearAllCache;

use Illuminate\Support\ServiceProvider;
use I9w3b\ClearAllCache\Commands\ClearAllCacheCommand;

class ClearAllCacheServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('clearallcache.php'),
            ], 'config');
            
            $this->commands([
                ClearAllCacheCommand::class,
            ]);
        }

    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'clearallcache');
    }
}
