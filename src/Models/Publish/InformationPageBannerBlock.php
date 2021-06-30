<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


Class InformationPageBannerBlock extends Model
{
  use SoftDeletes;
 

  public $orderable = true;
  public $orderField = "order";
  public $orderDirection = "asc";
  public $orderOptions = ['title'];

  public $hasStatus = true;
  public $statusField = "status";

  public $titleField = "title";

  public $parentOrder = "information_page_banner_id";
  public $parentTable = "information_page_banners";

  public $mainDropdownField = "max_columns";
  public $imageDropdownField = "banner_image";

  public $relationships = [];
  
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'title', 
    'column_count', 
    'description',
    'link', 
    'link_target', 
    'banner_image', 
    'mobile_image', 
    'information_page_banner_id',
    'status',
    'status_date',
  ];
  
  public $fields = [
  // ['field_name', 'label', 'field_type', 'options_model', 'options_relationship', 'width', 'height', 'container_class', 'can_remove'],

    ['title', 'Title', 'title', '', '', '', '', 'col-xs-12 col-md-6', ''],
    ['max_columns', 'Max Columns', 'select_from_array', [
      '1' => '1 Column', 
      '2' => '2 Columns', 
      '3' => '3 Columns'
    ], '', '', '', 'col-xs-12 col-md-6', ''],

    ['open_row', '', ''], 
      ['information_page_banner_id', '', 'parent', '', '', '', '', 'col-xs-12 col-md-6 d-none collapse hidden', ''],
      ['status', 'Status', 'status', '', '', '', '', 'col-xs-12 col-md-6', ''],
    ['close_row', '', ''], 

  ];

  public function banner()
  {
    return $this->belongsTo( App\Models\InformationPageBanner::class, 'information_page_banner_id' )->withDefault();
  }

}
