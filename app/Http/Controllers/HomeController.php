<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')
            ->where('status', 'published')
            ->latest()
            ->paginate(6);

        $categories = \App\Models\Category::withCount('posts')->get();
        $recent_posts = Post::where('status', 'published')->latest()->take(5)->get();

        return view('blog.index', compact('posts', 'categories', 'recent_posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $categories = \App\Models\Category::withCount('posts')->get();
        $recent_posts = Post::where('status', 'published')->latest()->take(5)->get();

        return view('blog.show', compact('post', 'categories', 'recent_posts'));
    }

    public function categoryPosts($slug)
    {
        $category = \App\Models\Category::where('slug', $slug)->firstOrFail();

        $posts = $category->posts()
            ->where('status', 'published')
            ->latest()
            ->paginate(10);

        $categories = \App\Models\Category::withCount('posts')->get();
        $recent_posts = Post::where('status', 'published')->latest()->take(5)->get();

        return view('blog.index', compact('posts', 'categories', 'recent_posts', 'category'));
    }
}
