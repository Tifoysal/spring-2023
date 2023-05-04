<?php

namespace Tifoysal\BangladeshUniversities;

use Tifoysal\BangladeshUniversities\Commands\SetupCommand;
use Illuminate\Support\ServiceProvider;

class BangladeshUniversitiesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../database/migrations' => database_path('migrations'),
                ], 'bangladesh-universities-migrations');

            // Registering package commands.
            $this->commands([
                SetupCommand::class
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'bangladesh-geocode');

        // Register the main class to use with the facade
        $this->app->singleton('bangladesh-universities', function () {
            return new BangladeshUniversities;
        });
    }
}
