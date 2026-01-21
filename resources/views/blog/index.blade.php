@extends('layouts.app')

@php
    $locale = app()->getLocale();
    $title_field = 'title_' . $locale;
    $body_field = 'body_' . $locale;
    $category_field = 'name_' . $locale;
@endphp

@section('content')
    <div class="hero">
        <div class="container">
            <h1>{{ __('Blog') }}</h1>
        </div>
    </div>

    <div class="container">
        @foreach ($posts as $post)
            <div class="post-card">
                <h2 class="post-title">
                    <a href="{{ route('post.show', $post->slug) }}">
                        {{ $post->$title_field }}
                    </a>
                </h2>
                <div class="post-meta">
                    {{ $post->created_at->format('M d, Y') }} |
                    {{ $post->category->$category_field ?? 'Uncategorized' }}
                </div>
                <div class="post-excerpt">
                    {{ Str::limit(strip_tags($post->$body_field), 150) }}
                </div>
                <a href="{{ route('post.show', $post->slug) }}"
                    style="display: inline-block; margin-top: 10px;">{{ __('Read More') }} &rarr;</a>
            </div>
        @endforeach

        <div class="pagination">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
