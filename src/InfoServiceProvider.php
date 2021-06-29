<?php

namespace Vault\Info;

use Illuminate\Support\ServiceProvider;

class InfoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
      /**
       * Optional methods to load your package assets
       */
      // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'info');
      $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
      $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
      $this->loadViewsFrom( __DIR__ . '/../resources/views', 'info' );

      /*
      if ($this->app->runningInConsole()) {
        $this->publishes([
            __DIR__.'/../config/info.php' => config_path( 'info.php' ),
          ], 'config');
        // Publishing the views.
        /*$this->publishes([
          __DIR__.'/../resources/views' => resource_path( 'views/vendor/info' ),
        ], 'views' );*/
        // Publishing assets.
        /*$this->publishes([
          __DIR__.'/../resources/assets' => public_path( 'vendor/info' ),
        ], 'assets' );*/
        // Publishing the translation files.
        /*$this->publishes([
          __DIR__.'/../resources/lang' => resource_path( 'lang/vendor/info' ),
        ], 'lang' );*/

        // Registering package commands.
        // $this->commands([
        //   Console\Commands\info::class
        // ]);
      }
      */
    }

    /**
     * Register the application services.
     */
    public function register()
    {
      // Automatically apply the package configuration
      $this->mergeConfigFrom(__DIR__.'/../config/info.php', 'info');

      // Register the main class to use with the facade
      $this->app->bind( 'info', function () {
        return new Info();
      });

      // return $this->app->make( 'Vault\Info\Info' );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['info'];
    }

}
