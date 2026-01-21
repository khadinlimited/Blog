@extends('layouts.admin')

@section('content')
    <div class="card">
        <h1>Website Settings</h1>

        @if (session('success'))
            <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('settings.update') }}" method="POST">
            @csrf

            <div style="margin-bottom: 15px;">
                <label style="display: block; font-weight: bold; margin-bottom: 5px;">Site Title</label>
                <input type="text" name="site_title" value="{{ $settings['site_title'] ?? '' }}"
                    style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; font-weight: bold; margin-bottom: 5px;">Site Logo Text</label>
                <input type="text" name="site_logo_text" value="{{ $settings['site_logo_text'] ?? '' }}"
                    style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; font-weight: bold; margin-bottom: 5px;">Footer Text</label>
                <input type="text" name="footer_text" value="{{ $settings['footer_text'] ?? '' }}"
                    style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; font-weight: bold; margin-bottom: 5px;">Facebook URL</label>
                <input type="url" name="facebook_url" value="{{ $settings['facebook_url'] ?? '' }}"
                    style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; font-weight: bold; margin-bottom: 5px;">Twitter URL</label>
                <input type="url" name="twitter_url" value="{{ $settings['twitter_url'] ?? '' }}"
                    style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
            </div>

            <button type="submit" class="btn">Save Settings</button>
        </form>
    </div>
@endsection
