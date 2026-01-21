<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <!-- Column 1: About -->
            <div class="footer-col">
                <h3 class="footer-heading">{{ $settings['site_logo_text'] ?? config('app.name') }}</h3>
                <p class="footer-desc">
                    {{ __('Discover the latest news, tips, and updates from') }}
                    {{ $settings['site_title'] ?? config('app.name') }}.
                </p>
            </div>

            <!-- Column 2: Quick Links -->
            <div class="footer-col">
                <h3 class="footer-heading">{{ __('Quick Links') }}</h3>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                    @auth
                        <li><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                    @else
                        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @endauth
                    @if (!empty($settings['website_url']))
                        <li><a href="{{ $settings['website_url'] }}" target="_blank">{{ __('Main Website') }}</a></li>
                    @endif
                </ul>
            </div>

            <!-- Column 3: Categories -->
            <div class="footer-col">
                <h3 class="footer-heading">{{ __('Categories') }}</h3>
                <ul class="footer-links">
                    @foreach ($categories->take(5) as $cat)
                        <li><a
                                href="{{ route('category.posts', $cat->slug) }}">{{ $cat->{'name_' . app()->getLocale()} }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Column 4: Social & Copyright -->
            <div class="footer-col">
                <h3 class="footer-heading">{{ __('Follow Us') }}</h3>
                <div class="footer-social">
                    @if (!empty($settings['facebook_url']))
                        <a href="{{ $settings['facebook_url'] }}" target="_blank" title="Facebook"><i
                                class="fa-brands fa-facebook"></i></a>
                    @endif
                    @if (!empty($settings['twitter_url']))
                        <a href="{{ $settings['twitter_url'] }}" target="_blank" title="Twitter"><i
                                class="fa-brands fa-twitter"></i></a>
                    @endif
                    @if (!empty($settings['instagram_url']))
                        <a href="{{ $settings['instagram_url'] }}" target="_blank" title="Instagram"><i
                                class="fa-brands fa-instagram"></i></a>
                    @endif
                    @if (!empty($settings['youtube_url']))
                        <a href="{{ $settings['youtube_url'] }}" target="_blank" title="YouTube"><i
                                class="fa-brands fa-youtube"></i></a>
                    @endif
                    @if (!empty($settings['linkedin_url']))
                        <a href="{{ $settings['linkedin_url'] }}" target="_blank" title="LinkedIn"><i
                                class="fa-brands fa-linkedin"></i></a>
                    @endif
                    @if (!empty($settings['pinterest_url']))
                        <a href="{{ $settings['pinterest_url'] }}" target="_blank" title="Pinterest"><i
                                class="fa-brands fa-pinterest"></i></a>
                    @endif
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>{{ $settings['footer_text'] ?? '© ' . date('Y') . ' Khadin.com. All rights reserved.' }}</p>
        </div>
    </div>
</footer>
