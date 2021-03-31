<?php

use Illuminate\Support\Facades\Redirect;

// Information Pages
Route::get( '/{page_url}', 'InformationController@index' )->name( 'info_pages' );
