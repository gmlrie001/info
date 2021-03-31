<?php

namespace Vault\Info\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InformationPageBanner extends Model
{
    use SoftDeletes;
    
    public $orderable = true;
    public $orderField = "order";
    public $orderDirection = "asc";

    public $statusField = "status";
    public $hasStatus = true;

    public $parentOrder = "page_id";
    public $parentTable = "information_pages";

    public $titleField = "title";
    public $orderOptions = ['title'];

    public $mainDropdownField = "max_columns";
    public $imageDropdownField = "";

    public $relationships = [];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 
        'max_columns',
        'page_id',
        'status',
        'status_date',
    ];
    
    public function page()
    {
        return $this->belongsTo( InformationPage::class )
                    ->where('status', 'PUBLISHED')->orWhere('status', 'SCHEDULED')
                    ->where('status_date', '>=', now())
            ->orderBy('order', 'asc');;
    }

    public $fields = [
        //  ['field_name', 'label', 'field_type', 'options_model', 'options_relationship', 'width', 'height', 'container_class', 'can_remove'],
            ['title', 'Title', 'text', '', '', '', '', 'col-xs-12 col-md-6', ''],
            ['max_columns', 'Max Columns', 'select_from_array', ['1' => '1 Column', '2' => '2 Columns', '3' => '3 Columns'], '', '', '', 'col-xs-12 col-md-6', ''],

            ['open_row', '', ''], 
                ['page_id', '', 'parent', '', '', '', '', 'col-xs-12 col-md-6 d-none collapse hidden', ''],
                ['status', 'Status', 'status', '', '', '', '', 'col-xs-12 col-md-6', ''],
            ['close_row', '', ''], 

        ];
}
