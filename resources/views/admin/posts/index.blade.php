@extends('layouts.admin')

@section('content')
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

        <div class="table-responsive">
            <table class="table table-hover table-striped mb-0 align-middle">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-3 border-top-0">ID</th>
                        <th class="border-top-0" style="width: 35%;">Title</th>
                        <th class="border-top-0">Category</th>
                        <th class="border-top-0">Author</th>
                        <th class="border-top-0">Views</th>
                        <th class="border-top-0">Date</th>
                        <th class="border-top-0">Status</th>
                        <th class="border-top-0 text-end pe-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td class="ps-3 text-muted">#{{ $post->id }}</td>
                            <td class="fw-medium">
                                <div class="text-truncate" style="max-width: 300px;" title="{{ $post->title_en }}">
                                    {{ Str::limit($post->title_en, 50) }}
                                </div>
                                <div class="small text-muted text-truncate" style="max-width: 300px;"
                                    title="{{ $post->title_bn }}">
                                    {{ Str::limit($post->title_bn, 50) }}
                                </div>
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
                                <span
                                    class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25 rounded-pill px-2">
                                    <i class="fa-regular fa-eye me-1"></i> {{ $post->views }}
                                </span>
                            </td>
                            <td class="small text-muted">
                                {{ $post->created_at->format('M d, Y') }}
                            </td>
                            <td>
                                <form action="{{ route('posts.updateStatus', $post) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status"
                                        class="form-select form-select-sm {{ $post->status == 'published' ? 'border-success text-success' : 'border-warning text-warning' }}"
                                        style="width: 110px; font-size: 0.8rem;" onchange="this.form.submit()">
                                        <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>
                                            Published</option>
                                        <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Draft
                                        </option>
                                    </select>
                                </form>
                            </td>
                            <td class="text-end pe-3">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-outline-secondary"
                                        title="Edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    @can('delete', $post)
                                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" title="Delete">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    @endcan
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
