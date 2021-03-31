<?php

namespace Vault\Info\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InformationPageArticle extends Model
{
    use SoftDeletes;
    
    public $orderable = true;
    public $orderField = "order";
    public $orderDirection = "asc";

    public $hasStatus = true;
    public $statusField = "status";

    public $parentOrder = "page_id";
    public $parentTable = "information_pages";

    public $titleField = "title";
    public $orderOptions = ['title'];
    
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

//     public function articles()
//     {
//         return $this->hasMany('App\Models\InformationPageArticleSubArticle', 'article_id');
//     }
    
//     public function displayArticles()
//     {
//         return $this->hasMany('App\Models\InformationPageArticleSubArticle', 'article_id')->where('status', 'PUBLISHED')->orWhere('status', 'SCHEDULED')->where('status_date', '>=', now())->orderBy('order', 'asc');
//     }
    
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
                ['page_id', '', 'parent', '', '', '', '', 'col-xs-12 col-md-6 d-none collapse hidden', ''],
                ['status', 'Status', 'status', '', '', '', '', 'col-xs-12 col-md-6', ''],
            ['close_row', '', ''], 
        ];
}
