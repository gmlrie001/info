<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


Class InformationPageBanner extends Model
{
  use SoftDeletes;
 

  public $orderable = true;
  public $orderField = "order";
  public $orderDirection = "asc";
  public $orderOptions = ['title'];

  public $hasStatus = true;
  public $statusField = "status";

  public $titleField = "title";

  public $parentOrder = "information_page_id";
  public $parentTable = "information_pages";

  public $mainDropdownField = "max_columns";
  public $imageDropdownField = "";

  public $relationships = [
    'information_page_banner_blocks' => 'blocks',
  ];
  
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'title', 
    'max_columns',
    'information_page_id',
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
      ['information_page_id', '', 'parent', '', '', '', '', 'col-xs-12 col-md-6 d-none collapse hidden', ''],
      ['status', 'Status', 'status', '', '', '', '', 'col-xs-12 col-md-6', ''],
    ['close_row', '', ''], 

  ];

  public function page()
  {
    return $this->belongsTo( \App\Models\InformationPage::class, 'information_page_id' )->withDefault();
  }

  public function blocks()
  {
    return $this->hasMany( \App\Models\InformationPageBannerBlock::class, 'information_page_banner_id' );
  }

  public function displayBlocks()
  {
    return $this->hasMany( \App\Models\InformationPageBannerBlock::class, 'information_page_banner_id' )
                ->where('status', 'PUBLISHED')->orWhere('status', 'SCHEDULED')
                ->where('status_date', '>=', now())
                ->orderBy('order', 'asc');;
  }

}
