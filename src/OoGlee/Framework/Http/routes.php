<?php

// Application routes
Route::group(['namespace' => 'Application'], function()
{
    #USER MODEL	
	// List Resources
	Route::get(OogleeUConfig::get('config.routes.base_uri'), 'UsersController@getIndex');
	// Show resource 
	Route::get(OogleeUConfig::get('config.routes.base_uri').'/{id}', 'UsersController@getShow');
});

// Admin routes
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function()
{
    Route::group(['middleware' => 'auth'], function() 
    {
    	#USER MODEL
        // List Resources
        Route::get(OogleeUConfig::get('config.routes.base_uri').'/post', ['as' => 'admin.post.index', 'uses' => 'UsersController@getIndex']);
    	// Create Resource GET/POST
        Route::get(OogleeUConfig::get('config.routes.base_uri').'/post/create', ['as' => 'admin.post.create', 'uses' => 'UsersController@getCreate']);
        Route::post(OogleeUConfig::get('config.routes.base_uri').'/post/create', ['as' => 'admin.post.create', 'uses' => 'UsersController@postCreate']);
        // Edit resource GET/POST
		Route::get(OogleeUConfig::get('config.routes.base_uri').'/post/{id}/edit', ['as' => 'admin.post.edit', 'uses' => 'UsersController@getEdit']);
		Route::post(OogleeUConfig::get('config.routes.base_uri').'/post/{id}/edit', ['as' => 'admin.post.edit', 'uses' => 'UsersController@postEdit']);
        // Delete resource
		Route::get(OogleeUConfig::get('config.routes.base_uri').'/post/{id}/delete', ['as' => 'admin.post.delete', 'uses' => 'UsersController@postDelete']);
    });
});
