<?php

namespace GorillaDash\ErrorHandler;

use Illuminate\Support\ServiceProvider;

/**
 * Class ErrorHandlerProvider
 *
 * @package GorillaDash\ErrorHandler
 */
class ErrorHandlerProvider extends ServiceProvider
{
    /**
     *
     */
    public function boot()
    {
        $this->registerPublishables();
    }

    /**
     *
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/gd-error-handler.php', 'gd-error-handler');

        $this->app->singleton('gd.error-handler', function () {
            return new Handler();
        });
    }

    /**
     *
     */
    private function registerPublishables()
    {
        $this->publishes([
            __DIR__.'/../config/gd-error-handler.php' => config_path('gd-error-handler.php'),
        ], 'config');
    }
}
