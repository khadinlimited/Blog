@extends('layouts.app')

@php
    $locale = app()->getLocale();
    $title_field = 'title_' . $locale;
    $body_field = 'body_' . $locale;
    $category_field = 'name_' . $locale;
@endphp

@section('content')
    @push('head')
        <meta name="description" content="{{ __('Discover the latest news, tips, and updates from Khadin marketplace.') }}">
        <meta property="og:title" content="{{ config('app.name') }} - Latest News & Updates">
        <meta property="og:description"
            content="{{ __('Discover the latest news, tips, and updates from Khadin marketplace.') }}">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ route('home') }}">
        <meta name="twitter:title" content="{{ config('app.name') }} - Latest News & Updates">
        <meta name="twitter:description"
            content="{{ __('Discover the latest news, tips, and updates from Khadin marketplace.') }}">
    @endpush

    {{-- Hero is handled in layout --}}

    <div class="blog-grid">
        @foreach ($posts as $post)
            <div class="post-card">
                <a href="{{ route('post.show', $post->slug) }}" class="post-thumb">
                    @if ($post->featured_image)
                        <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->$title_field }}">
                    @else
                        <div
                            style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #9ca3af;">
                            <svg style="width: 48px; height: 48px;" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                    @endif
                </a>

                <div class="post-content">
                    <div class="post-meta">
                        {{ $post->category->$category_field ?? 'Uncategorized' }}
                    </div>
                    <h2 class="post-title">
                        <a href="{{ route('post.show', $post->slug) }}">
                            {{ $post->$title_field }}
                        </a>
                    </h2>
                    <div class="post-excerpt">
                        {{ Str::limit(strip_tags($post->$body_field), 120) }}
                    </div>
                    <div>
                        <a href="{{ route('post.show', $post->slug) }}" class="read-more">{{ __('Read More') }}
                            &rarr;</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('pagination')
    <div class="pagination-wrapper mt-4">
        {{ $posts->links() }}
    </div>
@endsection
