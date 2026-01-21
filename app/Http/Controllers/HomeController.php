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

        $recent_posts = Post::where('status', 'published')->latest()->take(5)->get();

        return view('blog.index', compact('posts', 'recent_posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $recent_posts = Post::where('status', 'published')->latest()->take(5)->get();

        return view('blog.show', compact('post', 'recent_posts'));
    }

    public function categoryPosts($slug)
    {
        $category = \App\Models\Category::where('slug', $slug)->firstOrFail();

        $posts = $category->posts()
            ->where('status', 'published')
            ->latest()
            ->paginate(10);

        $recent_posts = Post::where('status', 'published')->latest()->take(5)->get();

        return view('blog.index', compact('posts', 'recent_posts', 'category'));
    }
}
