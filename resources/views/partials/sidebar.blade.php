@php
    $locale = app()->getLocale();
    $title_field = 'title_' . $locale;
    $category_field = 'name_' . $locale;
@endphp

<aside class="sidebar">
    <div class="widget">
        <h3>{{ __('Categories') }}</h3>
        <ul>
            @foreach ($categories as $cat)
                <li>
                    <a href="{{ route('category.posts', $cat->slug) }}">
                        {{ $cat->$category_field }}
                        <span>{{ $cat->posts_count }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="widget">
        <h3>{{ __('Recent Posts') }}</h3>
        <ul>
            @foreach ($recent_posts as $recent)
                <li>
                    <a href="{{ route('post.show', $recent->slug) }}" style="display: block;">
                        <div style="font-weight: 500; margin-bottom: 4px;">{{ $recent->$title_field }}</div>
                        <div style="font-size: 0.8rem; color: #6b7280;">
                            {{ $recent->created_at->format('M d, Y') }}</div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</aside>
