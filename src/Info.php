<?php

namespace Vault\Info;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;

use Vault\Info\App\Models\InformationPage;
use Vault\Info\App\Models\InformationPageArticle;

class Info
{

  public $info;
  public $config;

  public function __construct()
  {
    $this->info = __CLASS__;

    return $this;
  }
  
  public function setup( Config $config )
  {
    $this->config = $config;

    return $this;
  }

  public function test()
  {
    return [
      Info::class, 
      get_class( $this ), 
      gettype( Info::class )
    ];
  }

}
