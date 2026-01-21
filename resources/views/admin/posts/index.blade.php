@extends('layouts.admin')

@section('content')
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h1>Posts</h1>
            <a href="{{ route('posts.create') }}" class="btn">Create Post</a>
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
                    <th>Title (EN)</th>
                    <th>Title (BN)</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title_en }}</td>
                        <td>{{ $post->title_bn }}</td>
                        <td>{{ $post->category->name_en ?? 'N/A' }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>
                            <span
                                style="padding: 4px 8px; border-radius: 4px; background: {{ $post->status == 'published' ? '#d4edda' : '#f8d7da' }}; color: {{ $post->status == 'published' ? '#155724' : '#721c24' }};">
                                {{ ucfirst($post->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('posts.edit', $post) }}" class="btn"
                                style="background: #ffc107; color: black;">Edit</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST"
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
