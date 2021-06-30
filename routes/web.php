<?php

// use Illuminate\Support\Facades\Redirect;

// Information Pages
Route::middleware( ['web'] )->group( function() {

  Route::get( '/{page_url}', 'InformationController@index' );

});
