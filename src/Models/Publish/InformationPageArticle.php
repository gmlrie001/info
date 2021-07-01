<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class InformationPageArticle extends Model
{
  use SoftDeletes;
  

  public $orderable = true;
  public $orderField = "order";
  public $orderOptions = ['title'];
  public $orderDirection = "asc";

  public $hasStatus = true;
  public $statusField = "status";

  public $titleField = "title";

  public $parentOrder = "information_page_id";
  public $parentTable = "information_pages";

  public $mainDropdownField = "description";
  public $imageDropdownField = "featured_image";

  public $relationships = [];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'title', 
    'description',
    'featured_image', 
    'information_page_id', 
    'status',
    'status_date',
  ];
  

  public $fields = [
  // ['field_name', 'label', 'field_type', 'options_model', 'options_relationship', 'width', 'height', 'container_class', 'can_remove'],

    ['title', 'Title', 'title', '', '', '', '', 'col-xs-12 col-md-6', ''],

    ['open_parent', 'Content', ''], 
      ['open_row', '', ''], 
        ['description', 'Description', 'wysiwyg', '', '', '', '', 'col-xs-12 col-md-12', ''],
      ['close_row', '', ''],
    ['close_parent', 'Content', ''], 

    ['open_parent', 'Image Options', ''], 
      ['open_row', '', ''], 
        ['featured_image', 'Featured Image', 'image', '', '', '800', '600', 'col-xs-12 col-md-6', 'can_remove'],
      ['close_row', '', ''],
    ['close_parent', 'Image Options', ''],

    ['open_row', '', ''], 
      ['information_page_id', '', 'parent', '', '', '', '', 'col-xs-12 col-md-6 d-none collapse hidden', ''],
      ['status', 'Status', 'status', '', '', '', '', 'col-xs-12 col-md-6', ''],
    ['close_row', '', ''], 

  ];


  public function page()
  {
    return $this->belongsTo( \App\Models\InformationPage::class, 'information_page_id' )->withDefault();
  }

}
