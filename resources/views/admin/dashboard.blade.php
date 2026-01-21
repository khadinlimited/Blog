@extends('layouts.admin')

@section('content')
    <div class="card">
        <h1>Dashboard</h1>
        <p>Welcome to the admin panel.</p>

        <div
            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-top: 20px;">
            <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <h3>Total Posts</h3>
                <p style="font-size: 24px; font-weight: bold;">{{ $postCount }}</p>
            </div>
            <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <h3>Total Categories</h3>
                <p style="font-size: 24px; font-weight: bold;">{{ $categoryCount }}</p>
            </div>
        </div>
    </div>
@endsection
