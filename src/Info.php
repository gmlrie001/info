<?php

namespace Vault\Info;

Class Info
{

  public $packageNamespace;


  public function __construct()
  {
    $this->packageNamespace = __NAMESPACE__;
    
    /*
    // $this->aliasToAppModels();
    // $this->aliasToHttpRequests();
    */
    
    return $this;
  }

  public static function newInstance()
  {
    return new static();
  }

  public static function aliasToAppModels()
  {
    // self::$modelInstances = array_map( self::objectInstance( $instance ), self::$modelInstances );
    $modelInstances = [
      ( new \Vault\Info\Models\InformationPage ), 
      ( new \Vault\Info\Models\InformationPageBanner ), 
      ( new \Vault\Info\Models\InformationPageBannerBlock ), 
      ( new \Vault\Info\Models\InformationPageArticle ), 
    ];

    foreach( $modelInstances as $instance ) {
      $temp = explode( '\\', get_class( $instance ) );
      $className = array_pop( $temp );
      unset( $temp );

      try {
        $alias = class_alias( get_class( $instance ), "\\App\\Models\\$className", !0 );
        if ( ! $alias ) {
          info( 'Failed to alias App/Models/StoreCredit class: ' . get_class( $instance ) );
        }

      } catch( \Exception $error ) {}
    }
  }

  public static function aliasToHttpRequests()
  {
    $requestInstances = [
      ( new \Vault\Info\Requests\InformationPage\CreateRequest ),
      ( new \Vault\Info\Requests\InformationPage\UpdateRequest ),
      ( new \Vault\Info\Requests\InformationPageBanner\CreateRequest ),
      ( new \Vault\Info\Requests\InformationPageBanner\UpdateRequest ),
      ( new \Vault\Info\Requests\InformationPageBannerBlock\CreateRequest ),
      ( new \Vault\Info\Requests\InformationPageBannerBlock\UpdateRequest ),
      ( new \Vault\Info\Requests\InformationPageArticle\CreateRequest ),
      ( new \Vault\Info\Requests\InformationPageArticle\UpdateRequest ),
    ];

    foreach ($requestInstances as $instance) {
      $temp = explode('\\', get_class($instance));
      $requestType = array_pop($temp);
      $className   = array_pop($temp);
      unset($temp);

      try {
        $alias = class_alias(get_class($instance), "\\App\\Http\\Requests\\$className\\$requestType", !0);
        if (! $alias) {
            info('Failed to alias Http/Request/StoreCredit/... class: ' . get_class($instance));
        }

      } catch (\Exception $error) {}
    }
  }

  // public function test()
  // {
  //   return [
  //     Info::class, 
  //     get_class( $this ), 
  //     gettype( Info::class )
  //   ];
  // }

}
