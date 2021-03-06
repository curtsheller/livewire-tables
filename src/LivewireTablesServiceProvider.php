<?php

namespace Coryrose\LivewireTables;

use Coryrose\LivewireTables\Commands\MakeLivewireTableCommand;
use Coryrose\LivewireTables\Commands\ScaffoldLivewireTableCommand;
use Illuminate\Support\ServiceProvider;

class LivewireTablesServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'coryrose');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'coryrose');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();

            $this->commands([
                MakeLivewireTableCommand::class,
                ScaffoldLivewireTableCommand::class,
            ]);
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/livewire-tables.php', 'livewire-tables');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['livewire-tables'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/livewire-tables.php' => config_path('livewire-tables.php'),
        ], 'livewire-tables');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/coryrose'),
        ], 'livewire-tables.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/coryrose'),
        ], 'livewire-tables.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/coryrose'),
        ], 'livewire-tables.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
