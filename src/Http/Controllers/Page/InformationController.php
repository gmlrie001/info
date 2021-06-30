<?php

namespace Vault\Info\Http\Controllers\Page;

/* Base Controller Include */
use App\Http\Controllers\Services\PageController;

/* Model Includes */
use Vault\Info\App\Models\InformationPage;
use App\Models\Page;


class InformationPageController extends PageController
{

  public function __construct()
  {
    parent::__construct();

    $this->data['page'] = Page::find( config( 'information_pages.page_id' ) );
    // $pageSeoKeywordsArray = preg_match( '/(?:(,\s)+?)/isU', $this->data['info_page']->seo_keywords, PREG_OFFSET_CAPTURE, 0 );

    // $this->data['seo']['title']           = $this->data['page']->title .' | '. $this->data['info_page']->title;
    // $this->data['seo']['description']     = $this->data['page']->description;
    // $this->data['seo']['seo_title']       = $this->data['page']->seo_title .' | '. $this->data['page']->seo_title; 
    // $this->data['seo']['seo_description'] = $this->data['page']->seo_description; 
    // $this->data['seo']['seo_keywords']    = array_merge( $this->data['page']->seo_keywords, $pageSeoKeywordsArray ); 
    // $this->data['seo']['url']             = url( $this->data['page']->url_title );
    // $this->data['seo']['image']           = url( $this->data['site_settings']->logo );

    // return $this;
  }

  public function index( $url_title )
  {
    $this->data['info_page'] = InformationPage::where( 'url_title', $url_title )->first();

    abort_if( $this->data['info_page'] == null, 404 );

    $pageSeoKeywordsArray = preg_split( '/(?:(,\s)+?)/isU', $this->data['page']->seo_keywords, -1, PREG_SPLIT_NO_EMPTY );
    $infoPageSeoKeywordsArray = preg_split( '/(?:(,\s)+?)/isU', $this->data['info_page']->seo_keywords, -1, PREG_SPLIT_NO_EMPTY );

    $this->data['seo']['title']           = $this->data['page']->title .' | '. $this->data['info_page']->title;
    $this->data['seo']['description']     = $this->data['info_page']->description;
    $this->data['seo']['seo_title']       = $this->data['page']->seo_title .' | '. $this->data['info_page']->seo_title; 
    $this->data['seo']['seo_description'] = $this->data['info_page']->seo_description; 
    $this->data['seo']['seo_keywords']    = array_merge( $pageSeoKeywordsArray, $infoPageSeoKeywordsArray ); 
    $this->data['seo']['url']             = url( $this->data['page']->url_title );
    $this->data['seo']['image']           = url( $this->data['site_settings']->logo );

    return view('templates.information_pages.index', $this->data);
  }

}
