<?php

// Application routes
Route::group(['namespace' => 'Application'], function()
{
    #USER MODEL 
    // List Resources
    Route::get(OogleeUConfig::get('config.routes.base_uri'), ['as' => 'user.index', 'uses' => 'UsersController@getIndex']);
    // Show resource 
    Route::get(OogleeUConfig::get('config.routes.base_uri').'/{id}', ['as' => 'user.view', 'uses' => 'UsersController@getShow']);
});

// Admin routes
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function()
{
    Route::group(['middleware' => 'auth'], function() 
    {
    	#USER MODEL
        // List Resources
        Route::get(OogleeUConfig::get('config.routes.base_uri_admin'), ['as' => 'admin.user.index', 'uses' => 'UsersController@getIndex']);
    	// Create Resource GET/POST
        Route::get(OogleeUConfig::get('config.routes.base_uri_admin').'/create', ['as' => 'admin.user.create', 'uses' => 'UsersController@getCreate']);
        Route::post(OogleeUConfig::get('config.routes.base_uri_admin').'/create', ['as' => 'admin.user.create', 'uses' => 'UsersController@postCreate']);
        // Edit resource GET/POST
		Route::get(OogleeUConfig::get('config.routes.base_uri_admin').'/{id}/edit', ['as' => 'admin.user.edit', 'uses' => 'UsersController@getEdit']);
		Route::post(OogleeUConfig::get('config.routes.base_uri_admin').'/{id}/edit', ['as' => 'admin.user.edit', 'uses' => 'UsersController@postEdit']);
        // Delete resource
		Route::get(OogleeUConfig::get('config.routes.base_uri_admin').'/{id}/delete', ['as' => 'admin.user.delete', 'uses' => 'UsersController@postDelete']);
    });
});
