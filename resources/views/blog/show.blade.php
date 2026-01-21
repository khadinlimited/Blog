@extends('layouts.app')

@php
    $locale = app()->getLocale();
    $title_field = 'title_' . $locale;
    $body_field = 'body_' . $locale;
    $category_field = 'name_' . $locale;
@endphp

@section('title', $post->$title_field)

@section('content')
    <article>
        <div class="article-header">
            <div class="article-category">{{ $post->category->$category_field ?? 'Uncategorized' }}</div>
            <h1 class="article-title">{{ $post->$title_field }}</h1>
        </div>

        @if ($post->featured_image)
            <div class="post-gallery">
                <img src="{{ Storage::url($post->featured_image) }}" class="main-image">
            </div>
        @endif

        <div class="article-content">
            {!! nl2br(e($post->$body_field)) !!}
        </div>
    </article>
@endsection
