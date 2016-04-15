<?php

/**
 * Ooglee-user configuration settings
 */
return array(

	/**
	 * The Post configuration when listing resource
	 */
	'user_index' => array(
		/**
		 * The index page to use for listing resource
		 * 
		 */
		'index' => 'ooglee-user::site.user.index',
		/**
		 * The admin index page to use for listing resource
		 * 
		 */
		'index_admin' => 'ooglee-user::admin.user.index',
		/**
		 * How many users per page
		 */
    	'results_per_page' => 5,
	),

	/**
	 * The Post configuration when viewing resource
	 */
	'user_view' => array(
		/**
		 * The view page to use for showing resource
		 * 
		 */
		'view' => 'ooglee-user::site.user.view',
	),

	/**
	 * The Post configuration when creating resource
	 */
	'user_create' => array(
		/**
		 * The view page to use for creating resource
		 * 
		 */
		'view' => 'ooglee-user::admin.user.create',
	),

	/**
	 * The Post configuration when editing resource
	 */
	'user_edit' => array(
		/**
		 * The view page to use for editing resource
		 * 
		 */
		'view' => 'ooglee-user::admin.user.edit',
	),

	/**
	 * The Post routes to use with our package
	 */
	'user_routes' => array(
		/**
		 * Determines whether to load the package routes. If you want to specify them yourself in your own `app/routes.php`
		 * file then set this to false.
		 */
		'path_structure' => '{year}/{month}/{day}'
		/**
		 * Determines whether to load the package routes. If you want to specify them yourself in your own `app/routes.php`
		 * file then set this to false.
		 */
	),

	/**
	 * The Post routes to use with our package
	 */
	'user_routes' => array(
    	/**
		 * Base URI of the package's pages, e.g. "user" in http://domain.com/user and http://domain.com/user/my-user
		 */
		'base_uri' => 'user',
		/**
		 * Base URI of the package's pages, e.g. "user" in http://domain.com/user and http://domain.com/user/my-user
		 */
		'base_uri_admin' => 'admin/user'
	),
);