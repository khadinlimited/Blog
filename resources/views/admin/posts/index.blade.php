@extends('layouts.admin')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">
                    <i class="fa-solid fa-newspaper me-2 text-primary"></i>All Posts
                </h5>
                <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm">
                    <i class="fa-solid fa-plus me-1"></i>Create Post
                </a>
            </div>
        </div>

        <div class="card-body p-0">
            @if (session('success'))
                <div class="alert alert-success m-3 alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0 align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-3 border-top-0">ID</th>
                            <th class="border-top-0">Title</th>
                            <th class="border-top-0">Category</th>
                            <th class="border-top-0">Author</th>
                            <th class="border-top-0">Status</th>
                            <th class="border-top-0 text-end pe-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td class="ps-3 text-muted">#{{ $post->id }}</td>
                                <td class="fw-medium">
                                    {{ $post->title_en }}
                                    <div class="small text-muted">{{ $post->title_bn }}</div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border">
                                        {{ $post->category->name_en ?? 'N/A' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-circle small bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-2"
                                            style="width: 24px; height: 24px; font-size: 10px;">
                                            {{ substr($post->user->name, 0, 1) }}
                                        </div>
                                        {{ $post->user->name }}
                                    </div>
                                </td>
                                <td>
                                    @if ($post->status == 'published')
                                        <span
                                            class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 rounded-pill px-2">Published</span>
                                    @else
                                        <span
                                            class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 rounded-pill px-2">Draft</span>
                                    @endif
                                </td>
                                <td class="text-end pe-3">
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-outline-secondary"
                                            title="Edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" title="Delete">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i class="fa-regular fa-folder-open fa-2x mb-3 d-block opacity-50"></i>
                                    No posts found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
