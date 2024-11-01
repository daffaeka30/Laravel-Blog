<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\Services\Frontend\TagService;
use App\Http\Services\Frontend\ArticleService;
use App\Http\Services\Frontend\CategoryService;

class SideMenuProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('frontend.article._side-menu', function ($view) {
            $articleService = app(ArticleService::class);
            $view->with('popular_articles', $articleService->popularArticles());

            $categoryService = app(CategoryService::class);
            $view->with('categories', $categoryService->randomCategory());

            $tagService = app(TagService::class);
            $view->with('tags', $tagService->randomTag());
        });

        View::composer('frontend.home.section._populer-news', function ($view) {
            $tagService = app(TagService::class);
            $view->with('tags', $tagService->randomTag());

            // by category
            $articleService = app(ArticleService::class);
            $view->with('articleByProgram', $articleService->articleByCategory('program'));

            $articleService = app(ArticleService::class);
            $view->with('articleByTrend', $articleService->articleByCategory('trend'));

            $articleService = app(ArticleService::class);
            $view->with('articleByRomance', $articleService->articleByCategory('romance'));

            $articleService = app(ArticleService::class);
            $view->with('articleByDrama', $articleService->articleByCategory('drama'));

            $articleService = app(ArticleService::class);
            $view->with('articleByLaravel', $articleService->articleByCategory('laravel'));

            // single article
            $articleService = app(ArticleService::class);
            $view->with('articleSingleProgram', $articleService->articleSingle('program'));

            $articleService = app(ArticleService::class);
            $view->with('articleSingleTrend', $articleService->articleSingle('trend'));

            $articleService = app(ArticleService::class);
            $view->with('articleSingleRomance', $articleService->articleSingle('romance'));

            $articleService = app(ArticleService::class);
            $view->with('articleSingleDrama', $articleService->articleSingle('drama'));

            $articleService = app(ArticleService::class);
            $view->with('articleSingleLaravel', $articleService->articleSingle('laravel'));

            $articleService = app(ArticleService::class);
            $view->with('popular_articles', $articleService->popularArticles());

            $articleService = app(ArticleService::class);
            $view->with('random_articles', $articleService->randomArticle());
        });
    }
}