<?php namespace Ooglee\Domain\Providers;

use Ooglee\Domain\Providers\LaravelServiceProvider;

class OogleeUserServiceProvider extends LaravelServiceProvider {

	protected $packageVendor = 'rowland';

	protected $packageName = 'ooglee-user';

	protected $packageDir = __DIR__;

	protected $packageNameCapitalized = 'Ooglee-user';

	protected $packageConfigClass = 'Ooglee\Infrastructure\Config\OogleeUserConfig';

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		parent::boot();
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		parent::register();

		// Ooglee Service Providers
		\App::register('Ooglee\Domain\Providers\RouteUserServiceProvider');
		\App::register('Ooglee\Domain\Providers\EventUserServiceProvider');
		\App::register('Ooglee\Domain\Providers\UserServiceProvider');

		// Third Party Service Providers

		/**
        * This allows the facade to work without the developer having to add it to the Alias array in config/app.php
        * http://fideloper.com/create-facade-laravel-4
        * Works for L5 too
        */
		$this->app->booting(function()
		{
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();

			// 	Ooglee Facades
			$loader->alias('OogleeUConfig', 'Ooglee\Infrastructure\Config\Facades\OogleeUserConfigFacade');

			// Third Party Facades
			
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}
}
