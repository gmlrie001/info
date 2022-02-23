<?php

namespace Vault\Info;

use Illuminate\Support\ServiceProvider;


Class InfoServiceProvider extends ServiceProvider
{

  /**
   * Bootstrap the application services.
   */
  public function boot()
  {
    /**
     * Optional methods to load your package assets
     */

    // Load up package views translations, migrations, views, routes and publishable objects.
    // $this->loadTranslationsFrom( __DIR__ . '/../resources/lang', 'information_pages' );
    $this->loadMigrationsFrom( __DIR__ . '/../database/migrations' );
    $this->loadRoutesFrom( __DIR__ . '/../routes/web.php' );
    $this->loadViewsFrom( __DIR__ . '/../resources/views/information_pages', 'information_pages' );
    $this->publishModelsAndRequests();

    if ( $this->app->runningInConsole() ) {
      // Publish package configuration, publishable objects, views, assets, translations and registering commands.
      $this->publishes([
        __DIR__ . '/../config/information_pages.php' => config_path( 'information_pages.php' ),
      ], 'information_pages_config');

      $this->publishModelsAndRequests();

      /*$this->publishes([
        __DIR__ . '/../resources/views' => resource_path( 'views/vendor/information_pages' ),
      ], 'information_pages_views' );*/

      /*$this->publishes([
        __DIR__ . '/../resources/assets' => public_path( 'vendor/information_pages' ),
      ], 'information_pages_assets' );*/

      /*$this->publishes([
        __DIR__ . '/../resources/lang' => resource_path( 'lang/vendor/information_pages' ),
      ], 'information_pages_lang' );*/

      // $this->commands([
      //   Console\Commands\InformationPage::class
      // ]);
    }
  }

  /**
   * Register the application services.
   */
  public function register()
  {
    // Automatically apply the package configuration
    $this->mergeConfigFrom( __DIR__ . '/../config/information_pages.php', 'information_pages' );

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

  protected function publishModelsAndRequests()
  {
    // Taken from LaravelDaily/quickadmin (https://github.com/LaravelDaily/quickadmin/blob/master/src/QuickadminServiceProvider.php)
    $this->publishes([
      __DIR__ . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'Publish' . DIRECTORY_SEPARATOR . 'InformationPage.php'                                                                                     => app_path( 'Models' . DIRECTORY_SEPARATOR . 'InformationPage.php' ),
      __DIR__ . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'Publish' . DIRECTORY_SEPARATOR . 'InformationPageBanner.php'                                                                               => app_path( 'Models' . DIRECTORY_SEPARATOR . 'InformationPageBanner.php' ),
      __DIR__ . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'Publish' . DIRECTORY_SEPARATOR . 'InformationPageBannerBlock.php'                                                                          => app_path( 'Models' . DIRECTORY_SEPARATOR . 'InformationPageBannerBlock.php' ),
      __DIR__ . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'Publish' . DIRECTORY_SEPARATOR . 'InformationPageArticle.php'                                                                              => app_path( 'Models' . DIRECTORY_SEPARATOR . 'InformationPageArticle.php' ),

      __DIR__ . DIRECTORY_SEPARATOR . 'Http' . DIRECTORY_SEPARATOR . 'Requests' . DIRECTORY_SEPARATOR . 'Publish' . DIRECTORY_SEPARATOR . 'InformationPage' . DIRECTORY_SEPARATOR . 'CreateRequest.php'            => app_path( 'Http' . DIRECTORY_SEPARATOR . 'Requests' . DIRECTORY_SEPARATOR . 'InformationPage' . DIRECTORY_SEPARATOR . 'CreateRequest.php' ),
      __DIR__ . DIRECTORY_SEPARATOR . 'Http' . DIRECTORY_SEPARATOR . 'Requests' . DIRECTORY_SEPARATOR . 'Publish' . DIRECTORY_SEPARATOR . 'InformationPage' . DIRECTORY_SEPARATOR . 'UpdateRequest.php'            => app_path( 'Http' . DIRECTORY_SEPARATOR . 'Requests' . DIRECTORY_SEPARATOR . 'InformationPage' . DIRECTORY_SEPARATOR . 'UpdateRequest.php' ),
      __DIR__ . DIRECTORY_SEPARATOR . 'Http' . DIRECTORY_SEPARATOR . 'Requests' . DIRECTORY_SEPARATOR . 'Publish' . DIRECTORY_SEPARATOR . 'InformationPageBanner' . DIRECTORY_SEPARATOR . 'CreateRequest.php'      => app_path( 'Http' . DIRECTORY_SEPARATOR . 'Requests' . DIRECTORY_SEPARATOR . 'InformationPageBanner' . DIRECTORY_SEPARATOR . 'CreateRequest.php' ),
      __DIR__ . DIRECTORY_SEPARATOR . 'Http' . DIRECTORY_SEPARATOR . 'Requests' . DIRECTORY_SEPARATOR . 'Publish' . DIRECTORY_SEPARATOR . 'InformationPageBanner' . DIRECTORY_SEPARATOR . 'UpdateRequest.php'      => app_path( 'Http' . DIRECTORY_SEPARATOR . 'Requests' . DIRECTORY_SEPARATOR . 'InformationPageBanner' . DIRECTORY_SEPARATOR . 'UpdateRequest.php' ),
      __DIR__ . DIRECTORY_SEPARATOR . 'Http' . DIRECTORY_SEPARATOR . 'Requests' . DIRECTORY_SEPARATOR . 'Publish' . DIRECTORY_SEPARATOR . 'InformationPageBannerBlock' . DIRECTORY_SEPARATOR . 'CreateRequest.php' => app_path( 'Http' . DIRECTORY_SEPARATOR . 'Requests' . DIRECTORY_SEPARATOR . 'InformationPageBannerBlock' . DIRECTORY_SEPARATOR . 'CreateRequest.php' ),
      __DIR__ . DIRECTORY_SEPARATOR . 'Http' . DIRECTORY_SEPARATOR . 'Requests' . DIRECTORY_SEPARATOR . 'Publish' . DIRECTORY_SEPARATOR . 'InformationPageBannerBlock' . DIRECTORY_SEPARATOR . 'UpdateRequest.php' => app_path( 'Http' . DIRECTORY_SEPARATOR . 'Requests' . DIRECTORY_SEPARATOR . 'InformationPageBannerBlock' . DIRECTORY_SEPARATOR . 'UpdateRequest.php' ),
      __DIR__ . DIRECTORY_SEPARATOR . 'Http' . DIRECTORY_SEPARATOR . 'Requests' . DIRECTORY_SEPARATOR . 'Publish' . DIRECTORY_SEPARATOR . 'InformationPageArticle' . DIRECTORY_SEPARATOR . 'CreateRequest.php'     => app_path( 'Http' . DIRECTORY_SEPARATOR . 'Requests' . DIRECTORY_SEPARATOR . 'InformationPageArticle' . DIRECTORY_SEPARATOR . 'CreateRequest.php' ),
      __DIR__ . DIRECTORY_SEPARATOR . 'Http' . DIRECTORY_SEPARATOR . 'Requests' . DIRECTORY_SEPARATOR . 'Publish' . DIRECTORY_SEPARATOR . 'InformationPageArticle' . DIRECTORY_SEPARATOR . 'UpdateRequest.php'     => app_path( 'Http' . DIRECTORY_SEPARATOR . 'Requests' . DIRECTORY_SEPARATOR . 'InformationPageArticle' . DIRECTORY_SEPARATOR . 'UpdateRequest.php' ),
    ], 'information_pages_publishables');
  }

}
