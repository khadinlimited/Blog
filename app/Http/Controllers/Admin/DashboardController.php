<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        $postCount = Post::count();
        $categoryCount = Category::count();

        $totalViews = Post::sum('views');
        $popularPosts = Post::orderByDesc('views')->take(5)->get();
        $latestPosts = Post::latest()->take(5)->get();

        // Visitor Statistics
        $dailyTraffic = \App\Models\Visit::selectRaw('DATE(created_at) as date, count(*) as count')
            ->where('created_at', '>=', now()->subDays(14))
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->get();

        $topReferrers = \App\Models\Visit::selectRaw('referrer, count(*) as count')
            ->whereNotNull('referrer')
            ->where('referrer', '!=', '')
            ->groupBy('referrer')
            ->orderByDesc('count')
            ->take(10)
            ->get();

        return view('admin.dashboard', compact('postCount', 'categoryCount', 'totalViews', 'popularPosts', 'latestPosts', 'dailyTraffic', 'topReferrers'));
    }
}
