@php
    $locale = app()->getLocale();
    $category_field = 'name_' . $locale;
@endphp

<div class="hero mb-4">
    @if (isset($category))
        <h1>{{ $category->$category_field }}</h1>
        <p>{{ __('Posts in this category') }}</p>
    @else
        <h1>{{ __('Blog') }}</h1>
        <p>{{ __('Discover the latest news, tips, and updates from') }} <a href="https://khadin.com" target="_blank"
                style="color: inherit; text-decoration: underline;">Khadin marketplace</a>.</p>
    @endif
</div>
