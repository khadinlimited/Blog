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

    <!-- Open Graph -->
    <meta property="og:title" content="{{ $post->$title_field }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($post->$body_field), 160) }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ route('post.show', $post->slug) }}">
    @if ($post->featured_image)
        <meta property="og:image" content="{{ Storage::url($post->featured_image) }}">
    @endif

    <!-- Twitter -->
    <meta name="twitter:title" content="{{ $post->$title_field }}">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($post->$body_field), 160) }}">
    @if ($post->featured_image)
        <meta name="twitter:image" content="{{ Storage::url($post->featured_image) }}">
    @endif

    <!-- JSON-LD Schema -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BlogPosting",
      "headline": "{{ $post->$title_field }}",
      "image": [
        "{{ $post->featured_image ? Storage::url($post->featured_image) : '' }}"
      ],
      "datePublished": "{{ $post->created_at->toIso8601String() }}",
      "dateModified": "{{ $post->updated_at->toIso8601String() }}",
      "author": [{
          "@type": "Person",
          "name": "{{ $post->user->name }}",
          "url": "https://khadin.com"
        }]
    }
    </script>
@endpush



@section('content')
    <div class="container">
        <div class="content-wrapper">
            <!-- Main Content -->
            <div class="main-content">
                <article>
                    <div class="article-header">
                        <div class="article-category">{{ $post->category->$category_field ?? 'Uncategorized' }}</div>
                        <h1 class="article-title">{{ $post->$title_field }}</h1>
                        <div class="article-meta">
                            <span>{{ $post->created_at->format('M d, Y') }}</span>
                            <span>&bull;</span>
                            <span>By {{ $post->user->name }}</span>
                        </div>
                    </div>

                    {{-- Interactive Gallery System --}}
                    @if ($post->featured_image)
                        <div class="post-gallery">
                            <div class="main-image-container">
                                <img id="mainImage" src="{{ Storage::url($post->featured_image) }}"
                                    alt="{{ $post->$title_field }}" class="main-image">
                            </div>

                            <div class="thumbnail-strip">
                                {{-- Featured Image as first thumbnail --}}
                                <div class="thumbnail-item active"
                                    onclick="updateMainImage(this, '{{ Storage::url($post->featured_image) }}')">
                                    <img src="{{ Storage::url($post->featured_image) }}" alt="Featured">
                                </div>

                                {{-- Gallery Images --}}
                                @foreach ($post->images as $img)
                                    <div class="thumbnail-item"
                                        onclick="updateMainImage(this, '{{ Storage::url($img->image_path) }}')">
                                        <img src="{{ Storage::url($img->image_path) }}" alt="Gallery">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="article-content">
                        @php
                            $escapedBody = e($post->$body_field);
                            // Auto-link "Khadin.com" (case-insensitive)
                            $linkedBody = preg_replace(
                                '/(khadin\.com)/i',
                                '<a href="https://khadin.com" target="_blank" style="color: var(--primary); text-decoration: underline;">$1</a>',
                                $escapedBody,
                            );
                        @endphp
                        {!! nl2br($linkedBody) !!}
                    </div>

                    <script>
                        function updateMainImage(element, src) {
                            // Update Main Image
                            document.getElementById('mainImage').src = src;

                            // Update Active State
                            document.querySelectorAll('.thumbnail-item').forEach(el => el.classList.remove('active'));
                            element.classList.add('active');
                        }
                    </script>
                </article>

                <div>
                    <a href="{{ route('home') }}" class="back-btn">&larr; Back to all posts</a>
                </div>
            </div>

            <!-- Sidebar -->
            @include('partials.sidebar')
        </div>
    </div>
@endsection
