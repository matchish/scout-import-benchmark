<?php

namespace App\Providers;

use App\DefaultImportSourceFactory;
use Illuminate\Support\ServiceProvider;
use Matchish\ScoutElasticSearch\Searchable\ImportSourceFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ImportSourceFactory::class, function () {
            return new DefaultImportSourceFactory();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
