<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? ($settings['site_title'] ?? 'Khadin.com Blog') }}</title>
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @stack('head')
</head>

<body>
    <header>
        <div class="container text-center">
            <nav>
                <a href="{{ route('home') }}" class="logo">{{ $settings['site_logo_text'] ?? 'KhadinBlog' }}</a>
                <div class="nav-links">
                    <a href="{{ route('home') }}">{{ __('Home') }}</a>

                    <span class="lang-switch">
                        <a href="?lang=en" class="{{ app()->getLocale() == 'en' ? 'active' : '' }}">EN</a>
                        <a href="?lang=bn" class="{{ app()->getLocale() == 'bn' ? 'active' : '' }}">BN</a>
                    </span>

                    @auth
                        <a href="{{ route('dashboard') }}" class="btn-login">Dashboard</a>
                    @endauth
                </div>
            </nav>
        </div>
    </header>

    @yield('content')

    <footer>
        <div class="container">
            <p>{{ $settings['footer_text'] ?? '© ' . date('Y') . ' Khadin.com. All rights reserved.' }}</p>
        </div>
    </footer>
</body>

</html>
