<?php

namespace BambooRestApi;

use Illuminate\Support\ServiceProvider;
use BambooRestApi\Configuration\ConfigurationInterface;
use BambooRestApi\Configuration\DotEnvConfiguration;

class BambooRestApiServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 */
	public function boot()
	{
	}

	/**
	 * Register bindings in the container.
	 */
	public function register()
	{
		$this->app->bind(ConfigurationInterface::class, function () {
			return new DotEnvConfiguration(base_path());
		});
	}
}
