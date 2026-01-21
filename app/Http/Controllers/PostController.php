<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['user', 'category'])->latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_bn' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'body_en' => 'required',
            'body_bn' => 'required',
            'status' => 'required|in:draft,published',
            'featured_image' => 'nullable|image|max:2048',
            'gallery_images.*' => 'image|max:2048',
        ]);

        $featuredImagePath = null;
        if ($request->hasFile('featured_image')) {
            $featuredImagePath = $request->file('featured_image')->store('posts', 'public');
        }

        $post = Post::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'title_en' => $request->title_en,
            'title_bn' => $request->title_bn,
            'slug' => Str::slug($request->title_en),
            'body_en' => $request->body_en,
            'body_bn' => $request->body_bn,
            'status' => $request->status,
            'featured_image' => $featuredImagePath,
        ]);

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $path = $image->store('posts/gallery', 'public');
                $post->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_bn' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'body_en' => 'required',
            'body_bn' => 'required',
            'status' => 'required|in:draft,published',
            'featured_image' => 'nullable|image|max:2048',
            'gallery_images.*' => 'image|max:2048',
        ]);

        $data = [
            'category_id' => $request->category_id,
            'title_en' => $request->title_en,
            'title_bn' => $request->title_bn,
            'slug' => Str::slug($request->title_en),
            'body_en' => $request->body_en,
            'body_bn' => $request->body_bn,
            'status' => $request->status,
        ];

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('posts', 'public');
        }

        $post->update($data);

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $path = $image->store('posts/gallery', 'public');
                $post->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
