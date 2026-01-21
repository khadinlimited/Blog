<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Pagination\Paginator::defaultView('pagination.custom');

        // Share settings and categories with all views
        view()->composer('*', function ($view) {
            $settings = \App\Models\Setting::pluck('value', 'key');
            $categories = \App\Models\Category::withCount('posts')->get();
            $recent_posts = \App\Models\Post::where('status', 'published')->latest()->take(5)->get();
            
            $view->with('settings', $settings);
            $view->with('categories', $categories);
            $view->with('recent_posts', $recent_posts);
        });
    }
}
