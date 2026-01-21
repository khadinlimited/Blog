@extends('layouts.app')

@php
    $locale = app()->getLocale();
    $title_field = 'title_' . $locale;
    $body_field = 'body_' . $locale;
    $category_field = 'name_' . $locale;
@endphp

@section('title', $post->$title_field)

@push('head')
    <meta name="description" content="{{ Str::limit(strip_tags($post->$body_field), 160) }}">
    <meta property="og:title" content="{{ $post->$title_field }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($post->$body_field), 160) }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ route('post.show', $post->slug) }}">
@endpush

@section('content')
    <div class="container" style="margin-top: 40px;">
        <article>
            <h1 style="font-size: 2.5rem; margin-bottom: 10px;">{{ $post->$title_field }}</h1>
            <div class="post-meta"
                style="color: #666; margin-bottom: 30px; border-bottom: 1px solid #eee; padding-bottom: 20px;">
                {{ $post->created_at->format('M d, Y') }} |
                <span style="font-weight: bold;">{{ $post->category->$category_field ?? 'Uncategorized' }}</span> |
                By {{ $post->user->name }}
            </div>

            <div class="post-content" style="font-size: 1.1rem; line-height: 1.8;">
                {!! nl2br(e($post->$body_field)) !!}
            </div>
        </article>

        <div style="margin-top: 50px; border-top: 1px solid #eee; padding-top: 20px;">
            <a href="{{ route('home') }}">&larr; Back to Blog</a>
        </div>
    </div>
@endsection
