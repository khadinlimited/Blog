<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $postCount = Post::count();
        $categoryCount = Category::count();
        
        $totalViews = Post::sum('views');
        $popularPosts = Post::orderByDesc('views')->take(5)->get();
        $latestPosts = Post::latest()->take(5)->get();

        return view('admin.dashboard', compact('postCount', 'categoryCount', 'totalViews', 'popularPosts', 'latestPosts'));
    }
}
