<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Tag;
use App\Article;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Using Closure based composers...
        view()->composer('widgets.categories', function ($view) {
            $view->with('categories', Category::select('name', 'slug')->get());
        });

        view()->composer('widgets.tags', function ($view) {
            $view->with('tags', Tag::select('name', 'slug')->get());
        });

        view()->composer('widgets.recent', function ($view) {
            $view->with('articles', Article::select('title', 'slug')
                                    ->public()
                                    ->orderby('published_at', 'desc')
                                    ->take(8)
                                    ->get());
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
