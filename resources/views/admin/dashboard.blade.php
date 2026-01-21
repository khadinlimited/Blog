@extends('layouts.admin')

@section('content')
    <h2 class="mb-4 fw-bold">Dashboard</h2>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-primary text-white h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="display-4 me-3">
                        <i class="fa-solid fa-newspaper opacity-50"></i>
                    </div>
                    <div>
                        <h6 class="text-uppercase mb-1 small opacity-75">Total Posts</h6>
                        <h2 class="mb-0 fw-bold">{{ $postCount }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-success text-white h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="display-4 me-3">
                        <i class="fa-solid fa-folder-tree opacity-50"></i>
                    </div>
                    <div>
                        <h6 class="text-uppercase mb-1 small opacity-75">Categories</h6>
                        <h2 class="mb-0 fw-bold">{{ $categoryCount }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-info text-white h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="display-4 me-3">
                        <i class="fa-solid fa-eye opacity-50"></i>
                    </div>
                    <div>
                        <h6 class="text-uppercase mb-1 small opacity-75">Total Views</h6>
                        <h2 class="mb-0 fw-bold">{{ number_format($totalViews) }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Popular Posts -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="mb-0 fw-bold"><i class="fa-solid fa-fire text-danger me-2"></i>Most Popular Posts</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 align-middle">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-3 border-top-0">Title</th>
                                    <th class="border-top-0 text-center">Views</th>
                                    <th class="border-top-0 text-end pe-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($popularPosts as $post)
                                    <tr>
                                        <td class="ps-3">
                                            <div class="fw-medium text-truncate" style="max-width: 250px;">
                                                {{ $post->title_en }}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25 rounded-pill px-2">
                                                {{ number_format($post->views) }}
                                            </span>
                                        </td>
                                        <td class="text-end pe-3">
                                            <a href="{{ route('posts.edit', $post) }}"
                                                class="btn btn-sm btn-outline-secondary">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4 text-muted">No posts yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="mb-0 fw-bold"><i class="fa-solid fa-clock-rotate-left text-primary me-2"></i>Recent Activity
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        @forelse ($latestPosts as $post)
                            <div class="list-group-item px-3 py-3">
                                <div class="d-flex w-100 justify-content-between align-items-center mb-1">
                                    <h6 class="mb-0 text-truncate" style="max-width: 70%;">{{ $post->title_en }}</h6>
                                    <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <small class="text-muted">
                                        by <span class="fw-medium text-dark">{{ $post->user->name }}</span>
                                    </small>
                                    <span
                                        class="badge {{ $post->status == 'published' ? 'bg-success' : 'bg-secondary' }} bg-opacity-10 {{ $post->status == 'published' ? 'text-success' : 'text-secondary' }} border rounded-pill">
                                        {{ ucfirst($post->status) }}
                                    </span>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-4 text-muted">No recent activity.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
