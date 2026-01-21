<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Khadin.com Blog' }}</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            line-height: 1.6;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
        }

        header {
            background: #fff;
            border-bottom: 1px solid #eee;
            padding: 20px 0;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            text-decoration: none;
            color: #333;
        }

        .nav-links a {
            margin-left: 20px;
            text-decoration: none;
            color: #666;
        }

        .nav-links a:hover {
            color: #000;
        }

        .hero {
            background: #f8f9fa;
            padding: 40px 0;
            text-align: center;
            margin-bottom: 40px;
        }

        .hero h1 {
            margin: 0;
            font-size: 2.5rem;
        }

        .post-card {
            margin-bottom: 30px;
            padding-bottom: 30px;
            border-bottom: 1px solid #eee;
        }

        .post-title {
            margin-top: 0;
        }

        .post-title a {
            text-decoration: none;
            color: #333;
        }

        .post-meta {
            font-size: 0.9rem;
            color: #999;
            margin-bottom: 10px;
        }

        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 50px;
        }

        .lang-switch {
            margin-left: 20px;
        }

        .lang-switch a {
            margin-left: 5px;
            text-decoration: none;
            font-size: 0.8rem;
            padding: 2px 5px;
            border-radius: 3px;
        }

        .lang-switch a.active {
            background: #eee;
            color: #333;
        }
    </style>
    @stack('head')
</head>

<body>
    <header>
        <div class="container">
            <nav>
                <a href="{{ route('home') }}" class="logo">Khadin Blog</a>
                <div class="nav-links">
                    <a href="{{ route('home') }}">{{ __('Home') }}</a>
                    @auth
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endauth

                    <span class="lang-switch">
                        <a href="?lang=en" class="{{ app()->getLocale() == 'en' ? 'active' : '' }}">EN</a>
                        <a href="?lang=bn" class="{{ app()->getLocale() == 'bn' ? 'active' : '' }}">BN</a>
                    </span>
                </div>
            </nav>
        </div>
    </header>

    @yield('content')

    <footer>
        <div class="container">
            &copy; {{ date('Y') }} Khadin.com. All rights reserved.
        </div>
    </footer>
</body>

</html>
