<?php

/* Source: https://laracasts.com/discuss/channels/laravel/how-to-use-auth-middleware-in-my-own-package */
Route::group(['middleware' => ['web', 'auth']], function() {

    Route::get(  'home/vaultfilemanager', 'Monzamedia\VaultFilemanager\VaultFilemanagerController@index' );
    Route::get(  'home/vaultfilemanager/dirtree', 'Monzamedia\VaultFilemanager\VaultFilemanagerController@json_tree' );
    Route::post( 'home/vaultfilemanager/rename', 'Monzamedia\VaultFilemanager\VaultFilemanagerController@item_rename' );
    Route::post( 'home/vaultfilemanager/trash', 'Monzamedia\VaultFilemanager\VaultFilemanagerController@item_remove' );
    Route::post( 'home/vaultfilemanager/copy', 'Monzamedia\VaultFilemanager\VaultFilemanagerController@item_copy' );
    Route::post( 'home/vaultfilemanager/upload', 'Monzamedia\VaultFilemanager\VaultFilemanagerController@media_upload' );
    Route::post( 'home/vaultfilemanager/search', 'Monzamedia\VaultFilemanager\VaultFilemanagerController@media_search' );
    Route::post( 'home/vaultfilemanager/mkdir', 'Monzamedia\VaultFilemanager\VaultFilemanagerController@media_create_directory' );

});