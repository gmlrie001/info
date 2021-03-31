<?php

namespace Vault\Info\App\Http\Controllers\Page;

/* Base Controller Include */
use App\Http\Controllers\Services\PageController;

/* Model Includes */
use Vault\Info\App\Models\InformationPage;
use App\Models\Page;

class InformationController extends PageController {

    public function __construct()
    {
      parent__construct();
    }

    public function index( $url_title ){
        $this->data['page'] = InformationPage::where('url_title', $url_title)->first();

        abort_if( $this->data['page'] == null, 404 );

        $this->data['info_page'] = true;

        $this->data['seo']['seo_title'] = $this->data['page']->seo_title; 
        $this->data['seo']['seo_keywords'] = $this->data['page']->seo_keywords; 
        $this->data['seo']['seo_description'] = $this->data['page']->seo_description; 
        $this->data['seo']['title'] = $this->data['page']->title;
        $this->data['seo']['description'] = $this->data['page']->description;
        $this->data['seo']['image'] = url('/').'/'.$this->data['site_settings']->logo;
        $this->data['seo']['url'] = url('/').'/'.$this->data['page']->url_title;

        return view('templates.information_pages.index', $this->data);
    }

}
