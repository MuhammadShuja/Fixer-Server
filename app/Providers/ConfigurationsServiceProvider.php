<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Configuration;

class ConfigurationsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('configurations', function ($app) {
            return $app['cache']->remember('site.configurations', 60, function () {
                return Configuration::pluck('key', 'value')->toArray();
            });
        });
    }
}
