<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
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
        view()->composer('widgets.categories', function ($view) {
            $view->with('categories', DB::table('categories')
                                        ->leftJoin('articles', 'categories.id', '=', 'articles.category_id')
                                        ->select('categories.name', 'categories.slug', DB::raw('(case when `articles`.`category_id` is null then 0 else count(*) end) as `articles_count`'))
                                        ->groupBy('categories.id')
                                        ->get());
        });

        view()->composer('widgets.tags', function ($view) {
            $view->with('tags', DB::table('tags')
                                    ->leftJoin('article_tag', 'tags.id', '=', 'article_tag.tag_id')
                                    ->select('tags.name', 'tags.slug', DB::raw('(case when `article_tag`.`tag_id` is null then 0 else count(*) end) as `articles_count`'))
                                    ->groupBy('tags.id')
                                    ->get());
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
