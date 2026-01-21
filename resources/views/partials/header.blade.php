<header>
    <div class="container text-center">
        <nav>
            <a href="{{ route('home') }}" class="logo">{{ $settings['site_logo_text'] ?? config('app.name') }}</a>
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
