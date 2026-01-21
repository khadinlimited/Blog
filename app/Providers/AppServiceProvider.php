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
            $view->with('settings', $settings);
            $view->with('categories', $categories);
        });
    }
}
