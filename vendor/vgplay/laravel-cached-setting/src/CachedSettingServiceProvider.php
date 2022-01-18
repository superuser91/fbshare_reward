<?php

namespace Vgplay\LaravelCachedSetting;

use Illuminate\Support\ServiceProvider;

class CachedSettingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        foreach (glob(__DIR__ . '/Helper/*.php') as $filename) {
            require_once $filename;
        }
    }
}
