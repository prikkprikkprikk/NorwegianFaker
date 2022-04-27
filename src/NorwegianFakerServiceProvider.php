<?php

namespace Prikkprikkprikk\NorwegianFaker;

use Faker\Generator;
use Illuminate\Support\ServiceProvider;

class NorwegianFakerServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'prikkprikkprikk');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'prikkprikkprikk');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole())
        {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/norwegianfaker.php', 'norwegianfaker');

        // Add faker providers

        $this->app->singleton(
            Generator::class,
            function ($app)
            {
                $faker = \Faker\Factory::create();

                $faker->addProvider(new Faker\Provider\nb_NO\Company($faker));
                $faker->addProvider(new Faker\Provider\nb_NO\Text($faker));

                return $faker;
            }
        );

        // Register the service the package provides.
        // $this->app->singleton('norwegianfaker', function ($app) {
        //     return new NorwegianFaker;
        // });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        // return ['norwegianfaker'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/norwegianfaker.php' => config_path('norwegianfaker.php'),
        ], 'norwegianfaker.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/prikkprikkprikk'),
        ], 'norwegianfaker.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/prikkprikkprikk'),
        ], 'norwegianfaker.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/prikkprikkprikk'),
        ], 'norwegianfaker.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
