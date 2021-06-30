<?php

/*
|--------------------------------------------------------------------------
| Vault Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ==== //
/* CRUD */
// ==== //

// // ==== //
// /* Listing routes */
// Route::get('vault/{tableName}', 'CRUDController@listing');
// Route::get('vault/{tableName}/trash', 'TrashController@listing');
// Route::get('vault/{tableName}/relation/{relationId}', 'CRUDController@listing');

// // ==== //
// /* Add routes */
// Route::get('vault/{tableName}/add', 'CRUDController@add');
// Route::post('vault/{tableName}/add', 'CRUDController@store');

// // ==== //
// /* Edit routes */
// Route::get('vault/{tableName}/edit/{id}', 'CRUDController@edit');
// Route::post('vault/{tableName}/edit/{id}', 'CRUDController@update');

// // ==== //
// /* Duplicate Routes */
// Route::get('vault/{tableName}/duplicate/{id}', 'CRUDController@duplicate');
// Route::post('vault/{tableName}/duplicate/{id}', 'CRUDController@store');

// // ==== //
// /* Delete Routes */
// Route::get('vault/{tableName}/delete/{id}', 'CRUDController@delete');
// Route::any('vault/{tableName}/delete-selected', 'CRUDController@deleteSelected');
// Route::get('vault/{tableName}/delete/{id}/permanent', 'CRUDController@deletePermanent');
// Route::get('vault/{tableName}/delete-selected/permanent', 'CRUDController@deletePermanentSelected');

// // ==== //
// /* Restore Routes */
// Route::get('vault/{tableName}/restore/{id}', 'CRUDController@restore');
