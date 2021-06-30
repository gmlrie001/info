<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class InformationPage extends Model
{
  use SoftDeletes;

  
  public $orderable = true;
  public $orderField = "order";
  public $orderDirection = "asc";
  
  public $hasStatus = true;
  public $statusField = "status";

  public $titleField = "title";

  public $parentOrder = "";
  public $parentTable = "";
  public $orderOptions = ['title'];
  
  public $mainDropdownField = "description";
  public $imageDropdownField = "featured_image";

  public $relationships = [
    'information_page_banners'  => 'banners', 
    'information_page_articles' => 'articles'
  ];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'title', 
    'url_title', 
    'description',
    'featured_image',
    'seo_title',
    'seo_description',
    'seo_keywords',
    'status',
    'status_date',
  ];

  public $fields = [
  // ['field_name', 'label', 'field_type', 'options_model', 'options_relationship', 'width', 'height', 'container_class', 'can_remove'],

    ['title', 'Title', 'title', '', '', '', '', 'col-xs-12 col-md-6', ''],
    ['url_title', 'URL Title', 'url_title', '', '', '', '', 'col-xs-12 col-md-6', ''],

    ['open_parent', 'Content', ''], 
      ['open_row', '', ''], 
        ['description', 'Description', 'wysiwyg', '', '', '', '', 'col-xs-12 col-md-12', ''],
      ['close_row', '', ''],
    ['close_parent', 'Content', ''], 

    ['open_parent', 'Featured Image Options', ''], 
      ['open_row', '', ''], 
        ['featured_image', 'Feature Image', 'image', '', '', '800', '600', 'col-xs-12 col-md-6', 'can_remove'],
      ['close_row', '', ''],
    ['close_parent', 'Featured Image Options', ''], 

    ['open_parent', 'SEO Information', ''], 
      ['open_row', '', ''], 
        ['seo_title', 'SEO Title', 'text', '', '', '', '', 'col-xs-12 col-md-6', ''],
      ['close_row', '', ''],
      ['open_row', '', ''], 
        ['seo_description', 'SEO Description', 'textarea', '', '', '', '', 'col-xs-12 col-md-6', ''],
        ['seo_keywords', 'SEO Keywords', 'tags', '', '', '', '', 'col-xs-12 col-md-6', ''],
      ['close_row', '', ''],
    ['close_parent', 'SEO Information', ''],

    ['open_row', '', ''], 
      ['status', 'Status', 'status', '', '', '', '', 'col-xs-12 col-md-6', ''],
    ['close_row', '', ''], 

  ];


  public function articles()
  {
    return $this->hasMany( App\Models\InformationPageArticle::class, 'information_page_id' );
  }
  
  public function displayArticles()
  {
    return $this->hasMany( App\Models\InformationPageArticle::class, 'information_page_id' )->where( function ($query) {
        $query->where('status', 'PUBLISHED')->orWhere('status', 'SCHEDULED')
              ->where('status_date', '>=', now());
      }
    )->orderBy('order', 'asc');
  }


  public function banners()
  {
    return $this->hasMany( App\Models\InformationPageBanner::class, 'information_page_id' );
  }
  
  public function displayBanners()
  {
    return $this->hasMany( App\Models\InformationPageBanner::class, 'information_page_id' )->where( function ($query) {
        $query->where('status', 'PUBLISHED')->orWhere('status', 'SCHEDULED')
              ->where('status_date', '>=', now());
      }
    )->orderBy('order', 'asc');
  }

}
