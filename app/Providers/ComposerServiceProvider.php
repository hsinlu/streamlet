<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
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
        $this->categories();

        $this->tags();

        $this->recent();
    }

    protected function categories()
    {
        view()->composer('widgets.categories', function ($view) {
            $view->with('categories', Cache::remember('widgets_categories', 10, function() {
                return DB::table('categories')
                            ->leftJoin('articles', 'categories.id', '=', 'articles.category_id')
                            ->select('categories.name', 'categories.slug', DB::raw('(case when `articles`.`category_id` is null then 0 else count(*) end) as `articles_count`'))
                            ->groupBy('categories.id')
                            ->get();
            }));
        });
    }

    protected function tags()
    {
        view()->composer('widgets.tags', function ($view) {
            $view->with('tags', Cache::remember('widgets_tags', 10, function() {
                return DB::table('tags')
                            ->leftJoin('article_tag', 'tags.id', '=', 'article_tag.tag_id')
                            ->select('tags.name', 'tags.slug', DB::raw('(case when `article_tag`.`tag_id` is null then 0 else count(*) end) as `articles_count`'))
                            ->groupBy('tags.id')
                            ->get();
            }));
        });
    }

    protected function recent()
    {
        view()->composer('widgets.recent', function ($view) {
            $view->with('articles', Cache::remember('widgets_recent', 10, function() {
                return Article::select('title', 'slug')
                            ->public()
                            ->orderby('published_at', 'desc')
                            ->take(8)
                            ->get();
            }));
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
