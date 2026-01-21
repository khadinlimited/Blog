@extends('layouts.admin')

@section('content')
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h1>Categories</h1>
            <a href="{{ route('categories.create') }}" class="btn">Create Category</a>
        </div>

        @if (session('success'))
            <div
                style="padding: 10px; background: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 4px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name (EN)</th>
                    <th>Name (BN)</th>
                    <th>Slug</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name_en }}</td>
                        <td>{{ $category->name_bn }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category) }}" class="btn"
                                style="background: #ffc107; color: black;">Edit</a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
