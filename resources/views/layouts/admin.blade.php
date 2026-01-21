<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - Khadin</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: #333;
            color: #fff;
            padding: 20px;
        }

        .sidebar a {
            display: block;
            color: #ccc;
            text-decoration: none;
            padding: 10px 0;
        }

        .sidebar a:hover {
            color: #fff;
        }

        .content {
            flex: 1;
            padding: 20px;
            background: #f4f4f4;
            overflow-y: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .btn {
            padding: 8px 16px;
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-danger {
            background: #dc3545;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h2>Khadin Blog</h2>
        <a href="{{ route('dashboard') }}">{{ __('Admin Dashboard') }}</a>
        <a href="#">Posts</a>
        <a href="#">Categories</a>
        <a href="#">Settings</a>
    </div>
    <div class="content">
        <div class="header">
            <h3>Welcome, {{ Auth::user()->name }} ({{ ucfirst(Auth::user()->role) }})</h3>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
        @yield('content')
    </div>
</body>

</html>
