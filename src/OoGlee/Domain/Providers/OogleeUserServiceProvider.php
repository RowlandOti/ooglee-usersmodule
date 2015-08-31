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

		\App::register('Ooglee\Domain\Providers\RouteUserServiceProvider');
		\App::register('Ooglee\Domain\Providers\EventUserServiceProvider');
		\App::register('Ooglee\Domain\Providers\UserServiceProvider');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		parent::register();
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
