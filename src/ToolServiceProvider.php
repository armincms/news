<?php

namespace Armincms\News;
 
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova as LaravelNova; 

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations'); 

        LaravelNova::serving(function (ServingNova $event) {
            LaravelNova::resources([
                Nova\News::class,
                Nova\Tag::class,
                Nova\Category::class,
            ]);
        });
    } 

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
